@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-4">Employee Tracker</h2>
            
            <div class="input-group mb-3 search-box">
                <input type="text" id="searchInput" class="form-control" placeholder="Search Name/Designation/Department">
                <div class="input-group-append">
                    <button class="btn btn-primary" id="searchButton" type="button">Search</button>
                </div>
            </div>

            <div class="row"  id="employeeList">

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // get employees
            function getEmployees() {
                var searchValue = $('#searchInput').val();

                // AJAX request to fetch employees
                $.ajax({
                    url: '/api/user/list',
                    method: 'GET',
                    data: {
                        search: searchValue
                    },
                    success: function(response) {
                     
                        $('#employeeList').empty();

                        $.each(response.data, function(index, user) {
                            $('#employeeList').append(
                               '<div class="col-md-4">' +
                                '<div class="card employee-card">' +
                                '<div class="card-body">' +
                                '<h5 class="card-title">' + user.name + '</h5>' +
                                '<p class="card-text">' + user.designation.name + '</p>' +
                                '<p class="card-text">' + user.department.name + '</p>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                            );
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            getEmployees();

            $('#searchButton').click(function() {
                getEmployees();
            });

            $('#searchInput').keyup(function() {
                getEmployees();
            });

        });
    </script>
@endsection
