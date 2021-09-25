<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Git Log Laravel</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jqueryfiletree@2.1.4/src/jQueryFileTree.css">
    <style>
        body {
            font-size: .875rem;
        }

        .navbar .form-control {
            padding: .75rem 1rem;
            border-width: 0;
            border-radius: 0;
        }

        .form-control-dark {
            color: #fff;
            background-color: rgba(255, 255, 255, .1);
            border-color: rgba(255, 255, 255, .1);
        }

        .form-control-dark:focus {
            border-color: transparent;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
        }

        /*
         * Utilities
         */

        .border-top { border-top: 1px solid #e5e5e5; }
        .border-bottom { border-bottom: 1px solid #e5e5e5; }
    </style>
</head>
<body>

<div class="container-fluid pt-3">
    <div class="row justify-content-md-center">
        @if(count($records[0]) == 1)
            <div class="alert alert-danger" role="alert" data-mdb-color="danger">
                {{ \Illuminate\Support\Arr::get($records, '0.message') }}
            </div>
        @else
            <div class="card col-md-8 col-lg-8">
                <div class="card-body">
                    <main role="main">
                        <h2>History (click for details)</h2>
                        <div class="table-responsive">
                            <table class="table table-hover table-sm">
                                <thead>
                                <tr>
                                    <th>Commits</th>
                                    <th>Date</th>
                                    <th>Author</th>
                                    <th>Hash</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($records as $record)
                                    <tr onclick="return getFiles('{{ $record['hash'] }}')" style="cursor: context-menu;">
                                        <td>{{ $record['message'] }}</td>
                                        <td>{{ $record['date'] }}</td>
                                        <td>{{ $record['author'] }}</td>
                                        <td>{{ $record['hash'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </main>
                </div>
            </div>
            <div class="card col-md-3 col-lg-3">
                <div class="card-body">
                    <main>
                        <div class="container pt-3">
                            <div id="treeview"></div>
                        </div>
                    </main>
                </div>
            </div>
        @endif
    </div>
</div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>


<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
<script>
    function getFiles(hash) {
        $.ajax({
            type: "get",
            url: "/git_log?token={{ csrf_token() }}",
            data: {
                hash: hash
            },
            success: function (data){
                $('#treeview').empty();
                for (let i = 0; i < data.length; i++) {
                    $('#treeview').append(data[i]+'<br>');
                }
            },
            error: function (xhr, ajaxOptions, thrownError){

            }
        });
        return false;
    }
</script>
</html>
