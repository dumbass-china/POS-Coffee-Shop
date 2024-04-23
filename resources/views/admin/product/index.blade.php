@extends('front_master')
@section('content')
    <div class="container-fluid">
        <div class="table-responsive">

            <div class="card-header " style="background-color: #3559e0">
                <h3 class="card-title" style="font-size: 40px;color:white">Menu List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body bg-ligjt">
                <table id="example1" class="table">
                    <thead class="sticky">
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Trident</td>
                            <td>Internet
                                Explorer 4.0
                            </td>
                            <td>Win 95+</td>
                            <td> 4</td>
                            <td>X</td>
                        </tr>
                        <tr>
                            <td>Trident</td>
                            <td>Internet
                                Explorer 5.0
                            </td>
                            <td>Win 95+</td>
                            <td>5</td>
                            <td>C</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
