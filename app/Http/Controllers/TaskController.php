<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
// use App\File;
use App\Attachment;
use App\Traits\UploadTrait;

class TaskController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('welcome', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $task = new Task;
       return view('form', [
           'task' => $task,
           'check_affected_regions' => []
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
           'subject' => 'required|unique:tasks',
           'status' => 'required',
           'priority' => 'required',
           'due_date' => 'required',
           'assignee' => 'required',
           'reviewer' => 'required',
           'target_version' => 'required',
           'image' => 'required|array'
       ]);

       $task = new Task;
       $task->subject = $request->subject;
       $task->status = $request->status;
       $task->priority = $request->priority;
       $task->due_date = $request->due_date;
       $task->assignee = $request->assignee;
       $task->reviewer = $request->reviewer;
       $task->target_version = $request->target_version;
       $task->description = $request->description;
       $task->reviewer_comments = $request->reviewer_comments;
       $task->affected_regions = serialize($request['affected_regions']);
       $task->save();


        if ($request->hasFile('image')) {

          $image_value = [];
          foreach ($request->image as $key => $value) {
            $imageName = rand(11111, 99999).time().'.'.$value->getClientOriginalExtension();
            $value->move(public_path('Attachment'), $imageName);
            
            $attachment = new Attachment;
            $attachment->attach = $imageName;
            $attachment->task_id = $task->id;
            $attachment->save();
          }
        }

        return redirect()->action('TaskController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $check_affected_regions = unserialize($task->affected_regions);
        return view('form', [
           'task' => $task,
           'check_affected_regions' => $check_affected_regions == null ? [] : $check_affected_regions
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'subject' => 'required',
           'status' => 'required',
           'priority' => 'required',
           'due_date' => 'required',
           'assignee' => 'required',
           'reviewer' => 'required',
           'target_version' => 'required',
        ]);

      $task = Task::find($id);
      $task->subject = $request->subject;
      $task->status = $request->status;
      $task->priority = $request->priority;
      $task->due_date = $request->due_date;
      $task->assignee = $request->assignee;
      $task->reviewer = $request->reviewer;
      $task->target_version = $request->target_version;
      $task->description = $request->description;
      $task->reviewer_comments = $request->reviewer_comments;
      $task->affected_regions = serialize($request['affected_regions']);
      $task->save();

      if ($request->hasFile('image')) {

          $image_value = [];
          foreach ($request->image as $key => $value) {
            $imageName = rand(11111, 99999).time().'.'.$value->getClientOriginalExtension();
            $value->move(public_path('Attachment'), $imageName);
            
            $attachment = new Attachment;
            $attachment->attach = $imageName;
            $attachment->task_id = $task->id;
            $attachment->save();
          }
        }

        return redirect()->action('TaskController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        foreach ($task->attachments as $attachment) {
          $path = public_path()."/Attachment/".$attachment->attach;
          unlink($path);
          $attachment->destroy($attachment->id);
        }
        $task = Task::destroy($id);
    }

    public function delete_entry(Request $request)
    {
      $ids = explode(",", $request->ids);
      foreach ($ids as $id) {
        $this->destroy($id);
      }
      return "success";
    }

    public function delete_single_image(Request $request)
    {
      $attachment = Attachment::find($request->id);
      $path = public_path()."/Attachment/".$attachment->attach;
      unlink($path);
      $attachment->destroy($request->id);
      return "success";
    }
}
