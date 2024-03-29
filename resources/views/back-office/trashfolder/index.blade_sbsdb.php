@extends('layouts.back-office')

@section('main-content')
    <!-- Content area -->
    <div class="content">
        {{ dd("hi") }}
        <!-- Page length options -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Customers Data</h5>
                <div class="header-elements">
                    <div class="list-icons">
                       <a class="btn btn-primary text-light" href="">Add New Customer</a>
                    </div>
                </div>
            </div>


            <table class="table datatable-show-all">
                <thead>
                <tr>
                    <th>#</th>
                    <th>avatar</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Phone</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td><img src="{{ asset('client/images/user-pic-1.jpg') }}" style="height:80px; width: 80px; border-radius: 40px;"></td>
                        <td>{{ $customer->cust_name }}</td>
                        <td>{{ $customer->cust_email }}</td>
                        <td>{{ $customer->cust_phone }}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('back-office.customers.edit', $customer->id) }}"  class="dropdown-item"><i class="icon-pencil"></i> Edit </a>

                                        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $customer->id }}').submit();">
                                            <i class="icon-bin"></i><span>Remove</span>
                                        </a>
                                        <form id="delete-form-{{ $customer->id }}" action="{{ route('back-office.customers.destroy', $customer->id) }}" method="POST" style="display: none;">
                                            @csrf @method('delete')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /page length options -->


    </div>
    <!-- /content area -->

@endsection


@section('custom-script')
    <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_advanced.js') }}"></script>
@endsection
