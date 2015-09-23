@extends('layout')

@section('js')
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    @parent
@endsection

@section('title')
    Accueil
@endsection


@section('content')

    <div class="switch pull-right">
        <a href="{{ route('dashboard') }}" class="btn btn-flat btn-md">Simple</a>
        <a class="btn btn-flat btn-md disabled">Advance</a>
        <a  href="{{ route('dashboard3') }}" class="btn btn-flat btn-md">Pro</a>
        <a  href="{{ route('dashboard4') }}" class="btn btn-flat btn-md">Master</a>
    </div>


    <h2 class="title">Dashboard avancé</h2>

    <div class="row">
        <div id="carte" style="width:100%; height:350px"></div>
        @foreach ($cinemas as $cinema)
            <div class="cine" data-title="{{ $cinema->title }}" data-position="{{ $cinema->ville }}">
                {{ $cinema->title }}<br>

            </div>
        @endforeach
    </div>

    <div class="row">
        {{-- Recommandations cinémas --}}
        <div class="col-md-6">
            <div class="stat-panel widget-support-tickets" id="recommandations-cinemas">
                <div class="stat-row">
                    <!-- Dark gray background, small padding, extra small text, semibold text -->
                    <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                        <i class="fa fa-toggle-right"></i>&nbsp;&nbsp;Recommandations cin&eacute;mas
                        <span class="pull-right"><a class="refresh"><i class="fa fa-refresh"></i></a></span>
                    </div>
                </div> <!-- /.stat-row -->
                <div class="panel-body tab-content-padding">
                    <div class="panel-padding no-padding-vr refreshing"  data-url="{{ route('recommandations.ajax') }}">

                        @include('Recommandations.ajax')
                    </div>
                </div>
            </div>
        </div>

        {{-- Nouveaux utilisateurs --}}
        <div class="col-md-6">
            <div class="stat-panel widget-support-tickets" id="dashboard-support-tickets">
                <div class="stat-row">
                    <!-- Dark gray background, small padding, extra small text, semibold text -->
                    <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                        <i class="fa fa-user"></i>&nbsp;&nbsp;Utilisateurs r&eacute;cents (3 dernières semaines)
                    </div>
                </div> <!-- /.stat-row -->
                <div class="panel-body tab-content-padding">
                    <div class="panel-padding no-padding-vr">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Avatar / Username</th>
                                <th>Adresse</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="col-md-1">{{ $user->id }}</td>
                                        <td class="col-md-3">{{ $user->username }}</td>
                                        <td class="col-md-4">{{ $user->zipcode }} {{ $user->ville }}</td>
                                        <td class="col-md-4">{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel widget-tasks  panel-dark-gray">
                <div class="panel-heading">
                    <span class="panel-title"><i class="panel-title-icon fa fa-tasks"></i>Recent tasks</span>
                    <div class="panel-heading-controls">
                        <button class="btn btn-xs btn-primary btn-outline dark" id="clear-completed-tasks"><i class="fa fa-eraser text-success"></i> Clear completed tasks</button>
                    </div>
                </div> <!-- / .panel-heading -->
                <!-- Without vertical padding -->
                <div class="panel-body no-padding-vr">

                    @foreach ($tasks as $task)

                        <div class="task">

                            <?php
                            if ($task->criticality == 2) {
                                $label = "label label-warning";
                                $criticality = "High";
                            } elseif ($task->criticality == 1) {
                                $label = "label";
                                $criticality = "Low";
                            } else {
                                $label = "";
                                $criticality = "";
                            }
                            ?>

                            <span class="{{ $label }} pull-right">{{ $criticality }}</span>
                            <div class="fa fa-arrows-v task-sort-icon"></div>
                            <div class="action-checkbox">
                                <label class="px-single"><input type="checkbox" name="" value="{{ $task->active }}" class="px"><span class="lbl"></span></label>
                            </div>
                            <a href="#" class="task-title">{{ $task->title }}</a>
                        </div> <!-- / .task -->

                    @endforeach


                </div> <!-- / .panel-body -->
            </div> <!-- / .panel -->
        </div>

        <div class="col-md-6">
            <div class="panel widget-chat panel-dark-gray">
                <div class="panel-heading">
                    <span class="panel-title"><i class="panel-title-icon fa fa-comments-o"></i>Chat</span>
                </div> <!-- / .panel-heading -->
                <div class="panel-body">



                    @foreach ($messages as $message)
                    <div class="message">
                        <img src="assets/demo/avatars/5.jpg" alt="" class="message-avatar">
                        <div class="message-body">
                            <div class="message-heading">
                                <a href="#" title="">{{ $message['user']['name'] }}</a> says:
                                <span class="pull-right">

                                    {{ \Carbon\Carbon::createFromTimestamp(strtotime($message->created_at))->diffForHumans() }}
                                </span>
                            </div>
                            <div class="message-text">
                                {{ $message['content'] }}
                            </div>
                        </div> <!-- / .message-body -->
                    </div>  <!-- / .message -->
                    @endforeach


                </div> <!-- / .panel-body -->
                <form action="{{ route('messages.create') }}" method="post" class="panel-footer chat-controls">
                    {!! csrf_field() !!}
                    <div class="chat-controls-input">
                        <textarea name="content" rows="1" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-primary chat-controls-btn">Send</button>
                </form> <!-- / .panel-footer -->
            </div> <!-- / .panel -->
        </div>
    </div>


@endsection


