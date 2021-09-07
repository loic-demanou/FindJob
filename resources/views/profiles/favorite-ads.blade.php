@extends('partials.sidebar')
@section('content-sidebar')

    <div class="col-md-9 page-content">
        <div class="inner-box">
            <h2 class="title-2"><i class="icon-heart-1"></i> {{ __('sidebarClient.favourite') }} </h2>
            @auth

                @if (Auth::user()->likes->count() > 0)
                    <div class="table-responsive">
                        <div class="table-action">
                        <table id="favouriteTable" class="table table-striped table-bordered add-manage-table table demo"
                            data-filter="#filter" data-filter-text-only="true">
                            <thead>
                                <tr>
                                    <th> Photo</th>
                                    <th data-sort-ignore="true"> Details</th>
                                    <th data-type="numeric"> {{ __('home.salary') }}</th>
                                    <th> Option</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach (Auth::user()->likes as $like)

                                        <td style="width:14%" class="add-img-td"><a href="ads-details.html">
                                                @if ($like->job->image)
                                                    <img class="thumbnail  img-responsive"
                                                        src="{{ asset('storage') . '/' . $like->job->image }}" alt="img">
                                                @else
                                                    <img class="thumbnail  img-responsive"
                                                        src="{{ asset('storage') . '/' . $like->job->category->image }}"
                                                        alt="img">
                                                @endif
                                            </a></td>
                                        <td style="width:58%" class="ads-details-td">
                                            <div>
                                                <p><strong> <a href="{{ route('jobs.show', $like->job->id) }}" title="SAMSUNG GALAXY S CORE Duos ">
                                                            {{ $like->job->title }}</a> </strong></p>

                                                <p><strong> Posted On </strong>:
                                                    {{ $like->job->created_at->format('Y-m-d H:m') }} </p>

                                                <p><strong>Visitors </strong>: 221 <strong>Located In:</strong>
                                                    {{ $like->job->city->name }}
                                                </p>
                                            </div>
                                        </td>
                                        <td style="width:16%" class="price-td">
                                            <div><strong> {{ number_format($like->job->salary, 0, ',', '.') }} XAF</strong>
                                            </div>
                                        </td>
                                        <td style="width:10%" class="action-td">
                                            <form action="{{ route('favorite.delete', $like->id) }}" method="post">
                                                @csrf
                                                <div>
                                                    <p><a class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target=".shareAd"> <i class="fa fa-mail-forward"></i> Share
                                                        </a></p>
                                                    @method('DELETE')
                                                    <p><button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                            <i class=" fa fa-trash"></i> Remove
                                                        </button></p>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <div class="modal fade shareAd" id="shareAd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Share This Ad</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <a href="{{ route('social.index', $like->job->id) }}" target="_blank"><i class="fab fa-facebook-square ml-3"></i> Facebook</a>
                                        <a href="{{ route('social.twitter', $like->job->id) }}" target="_blank"><i class="fab fa-twitter ml-3"></i> Twitter</a>
                                        <a href="{{ route('social.linkedin', $like->job->id) }}" target="_blank"><i class="fab fa-linkedin-in ml-3"></i> LinkedIn</a>
                                        <a href="{{ route('social.whatsapp', $like->job->id) }}" target="_blank"><i class="fab fa-whatsapp ml-3"></i> WhatsApp</a>
                                        <a href="{{ route('social.telegram', $like->job->id) }}" target="_blank"><i class="fab fa-telegram ml-3"></i> Telegram</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                
                            </tbody>
                        </table>
                    </div>
                    <!--/.row-box End-->

                @else
                    <div class="card text-center">
                        <div class="card-header bg-primary text-white">
                            Whooops
                        </div>
                        <div class="card-body">
                            <p class="card-text">Aucun favori</p>
                            <a href="{{ route('jobs.index') }}"
                                class="btn btn-primary">{{ __('homeClient.back_job_list') }}</a>
                        </div>
                    </div>
                @endif
            @endauth



        </div>
    </div>


    <!-- Placed at the end of the document so the pages load faster -->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="{{ asset('assets/js/jquery/jquery-3.3.1.min.js') }}">\x3C/script>')
    </script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>

    <!-- include custom script for site  -->
    <script src="{{ asset('') }}assets/js/main.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#favouriteTable').DataTable();
        } );
    </script>



    <script src="{{ asset('assets/js/footable.js?v=2-0-1') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/footable.filter.js?v=2-0-1') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $('#addManageTable').footable().bind('footable_filtering', function(e) {
                var selected = $('.filter-status').find(':selected').text();
                if (selected && selected.length > 0) {
                    e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
                    e.clear = !e.filter;
                }
            });

            $('.clear-filter').click(function(e) {
                e.preventDefault();
                $('.filter-status').val('');
                $('table.demo').trigger('footable_clear_filter');
            });

        });
    </script>
    <!-- include custom script for ads table [select all checkbox]  -->
    <script>
        function checkAll(bx) {
            var chkinput = document.getElementsByTagName('input');
            for (var i = 0; i < chkinput.length; i++) {
                if (chkinput[i].type == 'checkbox') {
                    chkinput[i].checked = bx.checked;
                }
            }
        }
    </script>


@endsection
