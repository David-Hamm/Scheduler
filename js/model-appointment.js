scheduler.service('AppointmentModel', function() {
    this.getAppointments = function () {
        return [
            {
                appointmentId : '0',
                clientId : '0',
                clientName : 'John Smith',
                appointmentDate : '7/25/2019',
                appointmentStartTime : '9:00 AM',
                appointmentEndTime : '10:00 AM',
            },
            {
                appointmentId : '1',
                clientId : '1',
                clientName : 'Eric Johnson',
                appointmentDate : '7/25/2019',
                appointmentStartTime : '11:00 AM',
                appointmentEndTime : '11:30 AM'
            }
        ]
    };

    this.addAppointment = function(clientId, appointmentStart, appointmentEnd) {
        // todo: AJAX call to server to add appointment
    };

    this.deleteAppointment = function(appointmentId) {
        // todo: AJAX call to delete appointment
    };

    this.modifyAppointmentClient = function(clientId, appointmentId) {
        // todo: AJAX call to modify the client connected to an appointment
    };

    this.modifyAppointmentDateTimes = function(date, start, end) {
        // todo: AJAX call to modify the date or time on the appointment
    }
});