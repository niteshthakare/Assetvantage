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
    <link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- iCheck -->
    <link href="{{asset('assets/iCheck/skins/flat/green.css')}}" rel="stylesheet">

    <link href="{{asset('assets/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
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
                    <img src="images/img.jpg" alt="">Admin
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
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Issues</small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="close-add" href="task/create"><i class="fa fa-plus"></i> Add</a>
                        <li><a class="close-add" id="delete_action"><i class="fa fa-remove"></i> Delete</a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
  
                    <div class="x_content">
  
                      <div class="table-responsive">
                        <table class="table table-striped jambo_table">
                          <thead>
                            <tr class="headings">
                              <th>
                                <input type="checkbox" id="check-all" class="flat">
                              </th>
                              <th class="column-title">Issue Id </th>
                              <th class="column-title">Subject </th>
                              <th class="column-title">Status </th>
                              <th class="column-title">Priority </th>
                              <th class="column-title">Due Date </th>
                              <th class="column-title">Assignee </th>
                              <th class="column-title">Reviewer</th>
                              <th class="column-title">Target Version</th>
                              <th class="column-title">Edit</th>
                            </tr>
                          </thead>
  
                          <tbody>
                          @foreach($tasks as $task)
                            <!-- {{$task->id}} -->
                          
                            <tr class="even pointer">
                              <td class="a-center ">
                                <input type="checkbox" class="flat" value="{{$task->id}}" name="table_records">
                              </td>
                              <td class=" ">CR{{$task->id}}</td>
                              <td class=" ">{{$task->subject}}</td>
                              <td class=" ">{{$task->status}}</td>
                              <td class=" ">{{$task->priority}}</td>
                              <td class=" ">{{date('d-M-Y ',strtotime($task->due_date))}}</td>
                              <td class=" ">{{$task->assignee}}</td>
                              <td class=" ">{{$task->reviewer}}</td>
                              <td class=" ">{{$task->target_version }}
                              <td class=" last"><a href="{{route('task.edit',['id'=>$task->id])}}" class = "btn btn-info">Edit</a></td>

                            </tr>
                          @endforeach
                            <!-- <tr class="odd pointer">
                              <td class="a-center ">
                                <input type="checkbox" class="flat" name="table_records">
                              </td>
                              <td class=" ">121000041</td>
                              <td class=" ">Lorem ipsum dolor sit amet</td>
                              <td class=" ">Assigned</td>
                              <td class=" ">High</td>
                              <td class=" ">23-Sept-2019</td>
                              <td class=" ">Dev 1</td>
                              <td class=" ">Dev 2</td>
                              <td class=" last"> 1.0.0
                              </td>
                            </tr> -->
                            
                          </tbody>
                        </table>
                      </div>
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
      $("#delete_action").click(function(){
        var selectedValues = "";
        $('input[type=checkbox]').each(function() {
          if($(this).prop('checked'))
          {
             selectedValues += $(this).val()+",";
          }
        });

        ids = selectedValues.substring(0, selectedValues.length - 1);
        // console.log(ids)

        $.ajax({
          type:'POST',
          url:'task/delete_entry',
          data:{ids:ids, "_token": "{{ csrf_token() }}",},
          success:function(data){
            window.location.reload();
          }
          });

      });
    </script>
  </body>
</html>
