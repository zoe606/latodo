@extends('layouts.app')

@section('content')
        <div class="jumbotron">
          <h1>Welcome!</h1>
          <p>Let's create something awesome this week.</p>
        </div>


        <div class="row">
          <div class="col-lg-6">
            <form action="{{ route('todo.store') }}" method="post">
              {{ csrf_field() }}
              <div class="input-group">
                <input type="text" name="task" class="form-control" placeholder="Cooking pie with cream">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit">Submit!</button>
                </span>
              </div><!-- /input-group -->
            </form>
          </div><!-- /.col-lg-6 -->
          <div class="col-lg-6">
          @if (Session::has('success'))
            <div class="input-group">
              <div class="alert alert-success alert-dismissible" role="alert" style="padding-bottom: 12px;padding-top: 11px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"&times;></a>
                <strong><tr> Success!<td></strong>{{ Session::get('success') }}
          @endif
              </div>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">Todo List</div>
              <div class="panel-body">
                <!-- Table -->
                <table class="table table-striped">
                  <thead></thead>
                  <tbody>
                    @foreach ($todos as $todo)
                      <tr>
                        <td>{{ $todo->task }}</td>
                        <td>
                          @if($todo->status == 0)

                            <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-info btn-xs">
                              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                            </a>

                            <a
                            href="{{ route('todo.destroy', $todo->id) }}"
                            class="btn btn-danger btn-xs"
                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $todo->id }}').submit();"
                            >
                              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete
                            </a>

                            <a
                            href="{{ route('todo.complete', $todo->id) }}"
                            class="btn btn-success btn-xs"
                            onclick="event.preventDefault(); document.getElementById('complete-form-{{ $todo->id }}').submit();"
                            >
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Mark as Complete!
                            </button>

                            <form id="delete-form-{{ $todo->id }}" action="{{ route('todo.destroy', $todo->id) }}" method="post">
                              {{ csrf_field() }}
                              <input type="hidden" name="_method" value="delete">
                            </form>

                            <form id="complete-form-{{ $todo->id }}" action="{{ route('todo.complete', $todo->id) }}" method="post">
                              {{ csrf_field() }}
                            </form>
                          @else
                            <span class="badge">Complete</span>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="assets/vendor/jquery-1.12.4/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
      <script src="assets/vendor/bootstrap-3.3.7/js/bootstrap.min.js"></script>
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
  </html>


@endsection
