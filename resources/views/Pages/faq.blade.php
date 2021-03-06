@extends('layout')

@section('title')
    FAQ
@endsection

@section('header')
    <h2><span class="text-light-gray">Pages /</span> FAQ</h2>
@endsection

@section('content')


    <h2>Foire aux questions</h2>

    <!-- 5. $FAQ =======================================================================================

            F.A.Q.
    -->

    <!-- Modal -->
    <div id="modal-faq" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog ">
            <div class="modal-content">
                <form action="" class="modal-body">
                    <input type="text" placeholder="Your name" class="form-control form-group-margin input-lg">
                    <input type="text" placeholder="Your email" class="form-control form-group-margin input-lg">
                    <textarea placeholder="Your question" class="form-control form-group-margin input-lg" rows="6"></textarea>
                    <div class="clearfix"><button type="submit" class="btn btn-lg btn-block btn-flat btn-primary">Send your question</button></div>
                </form>
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
    </div>
    <!-- / Modal -->


    <div class="row">
        <h2 class="col-sm-8 text-center text-left-sm text-slim">
            FAQ
        </h2>
        <form action="" class="col-sm-4 form-faq">
            <input type="text" placeholder="Enter keyword or question..." class="form-control input-sm rounded">
        </form>
    </div>


    <div class="row" style="margin-top: 20px;">
        <div class="col-sm-4 col-sm-push-8">
            <div class="panel no-border panel-dark">
                <div class="panel-body text-center">
                    <p class="text-lg text-slim">
                        Can't find the answer?
                    </p>
                    <div style="margin-top: 20px;">
                        <a href="#" class="btn btn-lg btn-primary btn-flat" data-toggle="modal" data-target="#modal-faq">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-8 col-sm-pull-4">
            <div class="panel-group" id="accordion-example">
                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-example" href="#collapseOne">
                            <strong>Q:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua?
                        </a>
                    </div> <!-- / .panel-heading -->
                    <div id="collapseOne" class="panel-collapse in">
                        <div class="panel-body">
                            <strong>A:</strong> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div> <!-- / .panel-body -->
                    </div> <!-- / .collapse -->
                </div> <!-- / .panel -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseTwo">
                            <strong>Q:</strong> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat?
                        </a>
                    </div> <!-- / .panel-heading -->
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <strong>A:</strong> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div> <!-- / .panel-body -->
                    </div> <!-- / .collapse -->
                </div> <!-- / .panel -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseThree">
                            <strong>Q:</strong> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu?
                        </a>
                    </div> <!-- / .panel-heading -->
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <strong>A:</strong> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div> <!-- / .panel-body -->
                    </div> <!-- / .collapse -->
                </div> <!-- / .panel -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseFour">
                            <strong>Q:</strong> Excepteur sint occaecat cupidatat?
                        </a>
                    </div> <!-- / .panel-heading -->
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <strong>A:</strong> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div> <!-- / .panel-body -->
                    </div> <!-- / .collapse -->
                </div> <!-- / .panel -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseOne1">
                            <strong>Q:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua?
                        </a>
                    </div> <!-- / .panel-heading -->
                    <div id="collapseOne1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <strong>A:</strong> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div> <!-- / .panel-body -->
                    </div> <!-- / .collapse -->
                </div> <!-- / .panel -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseTwo1">
                            <strong>Q:</strong> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat?
                        </a>
                    </div> <!-- / .panel-heading -->
                    <div id="collapseTwo1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <strong>A:</strong> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div> <!-- / .panel-body -->
                    </div> <!-- / .collapse -->
                </div> <!-- / .panel -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseThree1">
                            <strong>Q:</strong> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu?
                        </a>
                    </div> <!-- / .panel-heading -->
                    <div id="collapseThree1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <strong>A:</strong> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div> <!-- / .panel-body -->
                    </div> <!-- / .collapse -->
                </div> <!-- / .panel -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseFour1">
                            <strong>Q:</strong> Excepteur sint occaecat cupidatat?
                        </a>
                    </div> <!-- / .panel-heading -->
                    <div id="collapseFour1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <strong>A:</strong> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div> <!-- / .panel-body -->
                    </div> <!-- / .collapse -->
                </div> <!-- / .panel -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseOne2">
                            <strong>Q:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua?
                        </a>
                    </div> <!-- / .panel-heading -->
                    <div id="collapseOne2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <strong>A:</strong> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div> <!-- / .panel-body -->
                    </div> <!-- / .collapse -->
                </div> <!-- / .panel -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseTwo2">
                            <strong>Q:</strong> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat?
                        </a>
                    </div> <!-- / .panel-heading -->
                    <div id="collapseTwo2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <strong>A:</strong> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div> <!-- / .panel-body -->
                    </div> <!-- / .collapse -->
                </div> <!-- / .panel -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseThree2">
                            <strong>Q:</strong> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu?
                        </a>
                    </div> <!-- / .panel-heading -->
                    <div id="collapseThree2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <strong>A:</strong> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div> <!-- / .panel-body -->
                    </div> <!-- / .collapse -->
                </div> <!-- / .panel -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseFour2">
                            <strong>Q:</strong> Excepteur sint occaecat cupidatat?
                        </a>
                    </div> <!-- / .panel-heading -->
                    <div id="collapseFour2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <strong>A:</strong> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div> <!-- / .panel-body -->
                    </div> <!-- / .collapse -->
                </div> <!-- / .panel -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseOne3">
                            <strong>Q:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua?
                        </a>
                    </div> <!-- / .panel-heading -->
                    <div id="collapseOne3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <strong>A:</strong> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div> <!-- / .panel-body -->
                    </div> <!-- / .collapse -->
                </div> <!-- / .panel -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseTwo3">
                            <strong>Q:</strong> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat?
                        </a>
                    </div> <!-- / .panel-heading -->
                    <div id="collapseTwo3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <strong>A:</strong> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div> <!-- / .panel-body -->
                    </div> <!-- / .collapse -->
                </div> <!-- / .panel -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseThree3">
                            <strong>Q:</strong> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu?
                        </a>
                    </div> <!-- / .panel-heading -->
                    <div id="collapseThree3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <strong>A:</strong> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div> <!-- / .panel-body -->
                    </div> <!-- / .collapse -->
                </div> <!-- / .panel -->

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseFour3">
                            <strong>Q:</strong> Excepteur sint occaecat cupidatat?
                        </a>
                    </div> <!-- / .panel-heading -->
                    <div id="collapseFour3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <strong>A:</strong> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div> <!-- / .panel-body -->
                    </div> <!-- / .collapse -->
                </div> <!-- / .panel -->
            </div> <!-- / .panel-group -->
        </div>
    </div>



@endsection
