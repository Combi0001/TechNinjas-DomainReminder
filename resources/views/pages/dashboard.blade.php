@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <span>This page is for testing only ---   <a href="">+Add</a> | <a>Delete</a></span>
        <!-- +Add - allow for user to add new domain to list -->
        <!-- Delete - special form code to handle what boxes are ticked and how to delete it for delete button, only white when box is ticked, otherwise grey-->
            <table class="table table-striped">
                <tr>
                    <td>Domain</td>
                    <td>Status</td>
                    <td>Expiry</td>
                    <td>Last Checked</td>
                    <td></td>
                    <td></td>
                </tr>
                <!-- {{--
                    for each domain with this user, create a td? to display that domains info
                    also check if there is any, if not dont display the table at all
                --}}-->
                <!-- special hidden form? or somehting awsome for check box to allow for deleting, maybe id of the domain and user somehow-->
                <tr>
                    <!-- need to find a way to rotate this button image also -->
                    <td><button type="button" data-toggle="collapse" data-target="#1">
                            <i class="fas fa-angle-right"></i></button>
                    </td>
                    <td>http://www.somedomain.com</td>
                    <td>Available</td>
                    <td>2019-02-15</td>
                    <td>2018-02-05</td>
                    <td><input type="checkbox" class="form-check-input" id="cbdelete1"></td>
                </tr>
                <tr id="1" class="collapse in">
                    <td colspan="6">
                        <table>
                            <tr>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="notifycb1" value="option1">
                                        <label class="form-check-label" for="notifycb1">Notifications</label>
                                        <button type="button"> save </button>
                                    </div>
                                </td>
                            </tr>
                            <tr ><td colspan="6">another line with extra info</td></tr>
                        </table>
                    </td>
                </tr>



                 <tr>
                     <td><button type="button" data-toggle="collapse" data-target="#2"><i class="fas fa-angle-right"></i></button></td>
                    <td>http://www.somedomain.com.au</td>
                    <td>Available</td>
                    <td>2019-02-15</td>
                    <td>2018-02-05</td>
                     <td><input type="checkbox" class="form-check-input" id="cbdelete2"></td>
                </tr>
                <tr id="2" class="collapse in">
                    <td colspan="6">
                        <table>
                            <tr>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="notifycb2" value="option2">
                                        <label class="form-check-label" for="notifycb2">Notifications</label>
                                        <button type="button"> save </button>
                                    </div>
                                </td>
                            </tr>
                            <tr ><td colspan="6">another line with extra info</td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><button type="button" data-toggle="collapse" data-target="#3"><i class="fas fa-angle-right"></i></button></td>
                    <td>http://www.somedomain.net</td>
                    <td>Available</td>
                    <td>2019-02-15</td>
                    <td>2018-02-05</td>
                    <td><input type="checkbox" class="form-check-input" id="cbdelete3"></td>
                </tr>
                <tr>
                    <td><button type="button" data-toggle="collapse" data-target="#4"><i class="fas fa-angle-right"></i></button></td>
                    <td>http://www.somedomain.biz</td>
                    <td>Available</td>
                    <td>2019-02-15</td>
                    <td>2018-02-05</td>
                    <td><input type="checkbox" class="form-check-input" id="cbdelete4"></td>
                </tr>
                <tr>
                    <td><button type="button" data-toggle="collapse" data-target="#5"><i class="fas fa-angle-right"></i></button></td>
                    <td>http://www.someotherdomain.com</td>
                    <td>Not Available</td>
                    <td>2019-02-15</td>
                    <td>2018-02-05</td>
                    <td><input type="checkbox" class="form-check-input" id="cbdelete5"></td>
                </tr>
                <tr>
                    <td><button type="button" data-toggle="collapse" data-target="#6"><i class="fas fa-angle-right"></i></button></td>
                    <td>http://www.brazzers.com</td>
                    <td>Not Available</td>
                    <td>2019-02-15</td>
                    <td>2018-02-05</td>
                    <td><input type="checkbox" class="form-check-input" id="cbdelete6"></td>
                </tr>

            </table>
    </div>
@endsection
