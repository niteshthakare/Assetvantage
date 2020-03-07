<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Assignment</title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- iCheck -->
    <link href="{{ asset('assets/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <link href="{{ asset('asset/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <style>
    .container1 {
      position: relative;
      width: 50%;
    }

    .image {
      opacity: 1;
      display: block;
      width: 100%;
      height: auto;
      transition: .5s ease;
      backface-visibility: hidden;
    }

    .middle {
      transition: .5s ease;
      opacity: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      text-align: center;
    }

    .container1:hover .image {
      opacity: 0.3;
    }

    .container1:hover .middle {
      opacity: 1;
    }

    .text {
      background-color: #f1050f9e;
      color: white;
      font-size: 16px;
      padding: 16px 32px;
    }
</style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/" class="site_title"><span>Assignment</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="/"><i class="fa fa-table"></i> Issues </a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Admin
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
  
              <div class="clearfix"></div>
  
              <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Add Issue</small></h2>
                      <div class="clearfix"></div>
                    </div>
                    @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                    @endforeach
                    @endif
                    <div class="x_content">
                        <!-- <form class="form-horizontal form-label-left"> -->

                        {!! Form::model($task, [
                           'method' => $task->exists ? 'PUT' : 'POST',
                           'route' => $task->exists ? ['task.update', $task->id] : 'task.store',
                           'id' => 'module_form',
                           'class' => 'form-horizontal form-label-left',
                           'enctype' => 'multipart/form-data'
                       ]) !!}
                       {{csrf_field()}}
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Subject*</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                {!! Form::text('subject', null, [
                                  'class' => 'form-control',
                                  'placeholder' => 'Subject',
                                  'required' => 'true'
                                 ])!!}
                                <!-- <input type="text" class="form-control" placeholder="Subject"> -->
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                  <!-- <textarea class="form-control" rows="3" placeholder="Description"></textarea> -->
                                  {!! Form::textarea('description', null, [
                                       'id' => '',
                                       'style' => '',
                                       'class' => 'form-control',
                                       'placeholder' => 'Description',
                                       'rows' => 3,
                                       'required' => 'true'
                                   ]) !!}
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Status*</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                  <!-- <select class="form-control">
                                    <option>New</option>
                                    <option>Assigned</option>
                                    <option>In-Progress</option>
                                    <option>Under-review</option>
                                    <option>Closed</option>
                                  </select> -->
                                  {!! Form::select('status', ['New' => 'New', 'Assigned' => 'Assigned', 'In-Progress' => 'In-Progress', 'Under-review' => 'Under-review', 'Closed' => 'Closed'], $task->status, [
                                       'class' => "form-control",
                                       'multiple' => false,
                                       'required' => 'true'

                                   ]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Priority*
                                </label>
        
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="radio">
                                      <label>
                                        <!-- <input type="radio" class="flat" name="icheck"> -->
                                        {!! Form ::radio('priority','High',($task->status == 'High' ? true : false), [
                                          'class' => "flat",
                                          'required' => true
                                        ]) !!}
                                        High
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <!-- <input type="radio" class="flat" name="icheck"> Medium -->
                                        {!! Form ::radio('priority','Medium',($task->status == 'Medium' ? true : false), [
                                          'class' => "flat",
                                          'required' => true
                                        ]) !!}
                                        Medium
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <!-- <input type="radio" class="flat" name="icheck"> Low -->
                                        {!! Form ::radio('priority','Low',($task->status == 'Low' ? true : false), [
                                          'class' => "flat",
                                          'required' => true
                                        ]) !!}
                                        Low
                                      </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Affected Regions
                                </label>
        
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <!-- <div class="radio">
                                        <label>
                                          <input type="checkbox" class="flat"> China
                                        </label>
                                    </div> -->
                                    <div class="radio">
                                      <label>
                                        {!! Form::checkbox( 'affected_regions[]', 
                                                          "China",
                                                          in_array("China",$check_affected_regions),
                                                          ['class' => 'flat'])
                                         !!} China 
                                       </label>
                                     </div>

                                     <div class="radio">
                                      <label>
                                        {!! Form::checkbox( 'affected_regions[]', 
                                                          'Europe',
                                                          in_array("Europe",$check_affected_regions),
                                                          ['class' => 'flat'])
                                         !!} Europe
                                       </label>
                                     </div>

                                     <div class="radio">
                                      <label>
                                        {!! Form::checkbox( 'affected_regions[]', 
                                                          'India',
                                                          in_array("India",$check_affected_regions),
                                                          ['class' => 'flat'])
                                         !!} India
                                       </label>
                                     </div>

                                     <div class="radio">
                                      <label>
                                        {!! Form::checkbox( 'affected_regions[]', 
                                                          'Japan',
                                                          in_array("Japan",$check_affected_regions),
                                                          ['class' => 'flat'])
                                         !!} Japan
                                       </label>
                                     </div>

                                     <div class="radio">
                                      <label>
                                        {!! Form::checkbox( 'affected_regions[]', 
                                                          'Singapore',
                                                          in_array("Singapore",$check_affected_regions),
                                                          ['class' => 'flat'])
                                         !!} Singapore
                                       </label>
                                     </div>

                                     <div class="radio">
                                      <label>
                                        {!! Form::checkbox( 'affected_regions[]', 
                                                          'US',
                                                          in_array("US",$check_affected_regions),
                                                          ['class' => 'flat'])
                                         !!} US
                                       </label>
                                     </div>

                                </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Due Date <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                  <!-- <input type="text" id="duedate" class="form-control" placeholder="Due Date"> -->
                                  {!! Form::text('due_date', null, [
                                  'class' => 'form-control',
                                  'placeholder' => 'Due Date',
                                  'id' => 'duedate'
                                 ])!!}
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Assignee*</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <!-- <select class="form-control">
                                  <option>Dev 1</option>
                                  <option>Dev 2</option>
                                  <option>Dev 3</option>
                                  <option>Dev 4</option>
                                  <option>Dev 5</option>
                                </select> -->
                                {!! Form::select('assignee', ['Dev 1' => 'Dev 1', 'Dev 2' => 'Dev 2', 'Dev 3' => 'Dev 3', 'Dev 4' => 'Dev 4', 'Dev 5' => 'Dev 5'], $task->assignee, [
                                       'class' => "form-control",
                                       'multiple' => false,
                                       

                                   ]) !!}
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Reviewer*</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <!-- <select class="form-control">
                                  <option>Dev 1</option>
                                  <option>Dev 2</option>
                                  <option>Dev 3</option>
                                  <option>Dev 4</option>
                                  <option>Dev 5</option>
                                </select> -->
                                {!! Form::select('reviewer', ['Dev 1' => 'Dev 1', 'Dev 2' => 'Dev 2', 'Dev 3' => 'Dev 3', 'Dev 4' => 'Dev 4', 'Dev 5' => 'Dev 5'], $task->reviewer, [
                                       'class' => "form-control",
                                       'multiple' => false,
                                       

                                   ]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Target Version*</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <!-- <select class="form-control">
                                  <option>1.0.0</option>
                                  <option>1.0.1</option>
                                  <option>1.1.0</option>
                                  <option>1.1.1</option>
                                  <option>1.1.2</option>
                                </select> -->
                                {!! Form::select('target_version', ['1.0.0' => '1.0.0', '1.0.1' => '1.0.1', '1.1.0' => '1.1.0', '1.1.1' => '1.1.1', '1.1.2' => '1.1.2'], $task->target_version, [
                                       'class' => "form-control",
                                       'multiple' => false,
                                       

                                   ]) !!}
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Images*</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="file" multiple class="form-control" name="image[]"  placeholder="Images">
                                    @if ($task->exists)
                                      @foreach($task->attachments as $attachment)
                                        <div class="container1" onclick="delete_single_image({{$attachment->id}})"><img src="/Attachment/{{ $attachment->attach }}" height="100px" width="150px" />

                                            <div class="middle">
                                              <div class="text"><span class="glyphicon glyphicon-remove"></span></div>
                                            </div>
                                          </div>
                                        

                                      @endforeach  
                                    @endif
                                </div>
                              </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Reviewer Comments</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                  <!-- <textarea class="form-control" rows="3" placeholder="Reviwer Comments"></textarea> -->
                                  {!! Form::textarea('reviewer_comments', null, [
                                       'id' => '',
                                       'style' => '',
                                       'class' => 'form-control',
                                       'placeholder' => 'Reviwer Comments',
                                       'rows' => 3
                                   ]) !!}
                              </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <a href="/" type="button" class="btn btn-primary">Cancel</a>
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                              </div>
                            </div>
                          <!-- </form>               -->
                          {!! Form::close() !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('assets/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('assets/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('assets/fastclick/lib/fastclick.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('assets/iCheck/icheck.min.js')}}"></script>
    <!-- DateJS -->
    <script src="{{asset('assets/DateJS/build/date.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('assets/moment/min/moment.min.js')}}"></script>

    <script src="{{asset('assets/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>

    <!-- Autosize -->
    <script src="{{asset('assets/autosize/dist/autosize.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
	  <script type="text/javascript">
        $('#duedate').datetimepicker({
          defaultDate: new Date(),
          format: 'YYYY-MM-DD'
        });

        function delete_single_image(id) {
          $.ajax({
          type:'POST',
          url:'/delete_single_image',
          data:{id:id, "_token": "{{ csrf_token() }}",},
          success:function(data){
            window.location.reload();
          }
          });
        }
    </script>
  </body>
</html>
