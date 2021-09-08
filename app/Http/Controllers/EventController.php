<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

use App\Models\User;

class EventController extends Controller
{
    public function index(){
        /*
        $nome = "cadu";
        $idade = "19";
    
        $arr = [10,20,30];
    
        $grupo = ["juca", "cadu", "l"];
         */
        $search = request('search');
        
        if($search){
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        } else{
            $events = Event::All();
        }
        return view('welcome', [
            /*'nome' => $nome, 
            'idade' => $idade, 
            'profissao' => 'programador',
            'arr' => $arr,
            'grupo' => $grupo, */
            'events' => $events,
            'search' => $search
        ]);

    }

    public function create(){
        return view('events.create');
    }

    public function evento(){
        $events = Event::All();
        return view('events.evento', ['events' => $events]);
    }

    public function product(){
        $busca = request('search');
        return view('product', ['busca' => $busca]);
    }

    public function produto($id = null){
        return view('produto', ['id' => $id]);
    }

    public function home(){
        $nome = "cadu";
        $idade = "19";
    
        $arr = [10,20,30];
    
        $grupo = ["juca", "cadu", "l"];
    
        return view('home', [
            'nome' => $nome, 
            'idade' => $idade, 
            'profissao' => 'programador',
            'arr' => $arr,
            'grupo' => $grupo
        ]);
    }

    public function store(Request $request){
        $event = new Event;

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;


        //upload imagem
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $event->image = $imageName;
        }
        $user = auth()->user();
        $event->user_id = $user->id;
        $event->save();

        return redirect("/")->with('msg', 'evento criado com sucesso');
    }
    
    public function show($id){
        $event = Event::findOrFail($id);

        $user = auth()->user();
        $hasUserJoined = false;

        if($user){
            $userEvents = $user->eventsAsParticipant->toArray();
            foreach($userEvents as $userEvent){
                if($userEvent['id'] == $id){
                    $hasUserJoined = true;
                }
            }
        }

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();
        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner, 'hasUserJoined' => $hasUserJoined]);
    }

    public function dashboard(){
        $user = auth()->user();
        
        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard', 
        ['events' => $events, 'eventsasparticipant' => $eventsAsParticipant]
        );
    }

    public function destroy($id){
        Event::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Excluido com sucesso!');
    }

    public function edit($id){
        $user = auth()->user();
        
        $event = Event::findOrFail($id);
        if($user->id != $event->user_id){
            return redirect('/dashboard');
        }
        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request){
        $data = $request->all();
            //upload imagem
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $requestImage = $request->image;
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $requestImage->move(public_path('img/events'), $imageName);
                $data['image'] = $imageName;
            }
        Event::findOrFail($request->id)->update($data);
        return redirect('/dashboard')->with('msg', 'Editado com sucesso!');
        
    }

    public function joinEvent($id){
        $user = auth()->user();
        $user->eventsAsParticipant()->attach($id);
        $event = Event::findOrFail($id);
        return redirect('/dashboard')->with('msg', 'sua presença no evento foi confirmada ' . $event->title);
    }

    public function leaveEvent($id){
        $user = auth()->user();
        $user->eventsAsParticipant()->detach($id);
        $event = Event::findOrFail($id);
        return redirect('/dashboard')->with('msg', 'vc saiu do evento ' . $event->title);

    }
}
