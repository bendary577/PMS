@extends('layouts.dashboard')

@section('content')
        <!-- Page Content  -->
        <div id="content">
            @include('includes.dashboard_navbar')
            @include('receptionist.sections.add_appointment')
        </div>
        <script>
            //first calender
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('new_appointment_calender');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    selectable : true,
                    initialView: 'dayGridMonth',
                    events : [ { id : '1', title : 'client apponitment 1', start : '2021-09-08', resourceId : 'a'} ],
                    select : function(startDate){
                            document.getElementById('date').value = startDate.startStr;
                            var modal = document.getElementById("new_appointment_modal");
                            modal.style.display = "block";
                            var btn = document.getElementById("close_btn");
                            btn.onclick = function(){modal.style.display = "none";}
                            window.onclick = function(event) {
                                if (event.target == modal) {
                                    modal.style.display = "none";
                                }
                            }
                        },
                    eventMouseEnter : function(mouseEnterInfo ){
                        /* alert("mouse enter " + mouseEnterInfo.el); */
                    },
                    businessHours: {
                        // days of week. an array of zero-based day of week integers (0=Sunday)
                        daysOfWeek: [0, 1, 2, 3, 4 ],
                        startTime: '10:00', 
                        endTime: '18:00', 
                        }
                });
                calendar.render();
            });
        </script>
@endsection
