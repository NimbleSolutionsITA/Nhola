<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\Category;
use Illuminate\Http\Request;
use App\Content;
use App\Department;
use App\Service;
use App\Doctor;
use App;
use Mail;

use Session;
use PhpParser\Comment\Doc;

class ContentController extends Controller
{
    // VISTA pagina HOME
    public function index() {
        $locale = App::getLocale();
        $contents = Content::all()->wherein('key', ['home-dipartimenti'])->wherein('locale', $locale);
        return view('pages.home', compact('contents'));
    }

    // VISTA pagina struttura
    public function struttura($anchor = 'mission') {
        $locale = App::getLocale();
        $contents = Content::all()->wherein('key', ['mission', 'impegni', 'azienda', 'gruppo', 'gallery'])->wherein('locale', $locale);
        return view('pages.la_struttura', compact('contents', 'anchor'));
    }

    // VISTA pagina attività
    public function attivita() {
        $departments = Department::all();
        return view('pages.attivita', compact('departments'));
    }

    // VISTA pagina dipartimento
    public function dipartimento($dipartimento) {
        $department = Department::all()->where('slug', $dipartimento)->first();
        if (empty($department))
            return abort(404);
        $services = Service::all()->where('department_id', $department->id);
        $director = Doctor::all()->where('id', $department->director_id)->first();
        $team = $department->doctors;
        return view('pages.dipartimenti', compact('department', 'services', 'director', 'team'));
    }

    // VISTA pagina Servizio
    public function servizio($dipartimento, $servizio) {
        $department = Department::all()->where('slug', $dipartimento)->first();
        if (empty($department))
            return abort(404);
        $service = Service::all()->where('slug', $servizio)->first();
        if (empty($service))
            return abort(404);
        $head = Doctor::all()->where('id', $service->head_id)->first();
        $team = $service->doctors;
        return view('pages.servizi', compact('department', 'service', 'head', 'team'));
    }

    // VISTA pagina accoglienza
    public function accoglienza() {
        $locale = App::getLocale();
        $departments = Department::all();
        $ricovero = Content::all()->wherein('key', ['degenza', 'ricovero-cardio', 'dimissione', 'ricovero-paganti'])->wherein('locale', $locale);
        $generali = Content::all()->wherein('key', ['degenza-info', 'albergo', 'orari', 'familiari', 'taxi', 'pasti', 'valori', 'giornali', 'barbiere', 'religione', 'vestiti', 'parcheggio'])->wherein('locale', $locale);
        return view('pages.accoglienza', compact('ricovero', 'generali', 'departments'));
    }

    // VISTA pagina Informazioni Utili
    public function infoUtili() {
        $locale = App::getLocale();
        $departments = Department::all();
        $generali = Content::all()->wherein('key', ['degenza-info', 'albergo', 'orari', 'familiari', 'taxi', 'pasti', 'valori', 'giornali', 'barbiere', 'religione', 'vestiti', 'parcheggio'])->wherein('locale', $locale);
        return view('pages.informazioni-utili', compact('generali', 'departments'));
    }

    // VISTA pagina Modalità accettazione e ricovero
    public function modalitaRicovero() {
        $locale = App::getLocale();
        $departments = Department::all();
        $ricovero = Content::all()->wherein('key', ['degenza', 'ricovero-cardio', 'dimissione', 'ricovero-paganti'])->wherein('locale', $locale);
        return view('pages.modalita-ricovero', compact('ricovero', 'departments'));
    }

    // VISTA pagina medici
    public function medici() {
        $departments = Department::all();
        $services = Service::all();
        $heads = collect([]);
        foreach ($services as $service) {
            $heads->push($service->head);
        }
        $heads = $heads->unique('fullname');
        $heads->values()->all();
        $doctors = Doctor::all();
        return view('pages.medici', compact('doctors', 'departments', 'heads'));
    }

    // VISTA pagina medico
    public function medico($id, $slugfullname) {
        $doctor = Doctor::all()->where('id', $id)->first();
        if (empty($doctor))
            return abort(404);
        if (str_slug($doctor->fullname, "-") != $slugfullname)
            return str_slug($doctor->fullname, "-");
        // Attach span tag to title excluding first word
        // Split on spaces.
        $title = preg_split("/\s+/", $doctor->fullName());
        // Replace the first word.
        $title[0] = $title[0] . "<span>&nbsp;";
        // Replace the last word.
        $index = count( $title ) - 1;
        $title[$index] = $title[$index] . "</span>";
        // Re-create the string.
        $title = join(" ", $title);
        return view('pages.medico', compact('doctor', 'title'));
    }

    // VISTA pagina news
    public function news() {
        $posts = Post::paginate(4);
        $categories = Category::all();
        return view('pages.news', compact('posts', 'categories'));
    }

    // VISTA pagina categoria
    public function newsCat($category) {
        $categoria = Category::all()->where('slug', $category)->first();
        if (empty($categoria))
            return abort(404);
        $posts = Post::where('category_id', $categoria->id)->paginate(4);
        $categories = Category::all();
        return view('pages.news', compact('posts', 'categories', 'categoria'));
    }

    // VISTA pagina singola notizia
    public function notizia($category, $slug) {
        $categoria = Category::all()->where('slug', $category)->first();
        if (empty($categoria))
            return abort(404);
        $post = Post::all()->where('slug', $slug)->first();
        if (empty($post))
            return abort(404);
        $categories = Category::all();
        if ($categoria->id == $post->category_id)
            return view('pages.notizia', compact('post', 'categories', 'categoria'));
        else
            return abort(404);
    }

    // VISTA pagina contatti
    public function contatti() {
        return view('pages.contatti');
    }

    // FORM pagina contatti
    public function postContatti(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'message' => 'min:10',
            'subject' => 'min:3',
            'honeypot_name' => 'honeypot',
            'honeypot_time' => 'required|honeytime:5'
        ]);
        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->bodyMessage
        );
        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('max.dichiara@gmail.com');
            $message->subject($data['subject']);
        });

        return view('pages.contatti');
    }

    // FORM personale per ogni medico
    public function docContact(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'YourName' => 'min:10',
            'subject' => 'min:3',
            'honeypot_name' => 'honeypot',
            'honeypot_time' => 'required|honeytime:5'
        ]);
        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->bodyMessage,
            'toEmail' => $request->toEmail
        );
        Mail::send('emails.contact-doc', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to($data['toEmail']);
            $message->subject($data['subject']);
        });
        return back();
    }

    // FORM appuntamenti in header
    public function postHeadForm(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'enteryourname' => 'min:10',
            'yourphonebumber' => 'min:3',
            'honeypot_name' => 'honeypot',
            'honeypot_time' => 'required|honeytime:5'
        ]);
        $data = array(
            'email' => $request->email,
            'yourphonebumber' => $request->subject,
            'enteryourname' => $request->enteryourname
        );
        Mail::send('emails.headForm', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('maxime.dichiara@gmail.com');
            $message->subject($data['yourphonebumber']);
        });
        return back();
    }
}