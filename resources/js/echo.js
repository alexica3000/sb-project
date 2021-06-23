import Swal from 'sweetalert2'

Echo
    .channel('test')
    .listen('TestEvent', e => {
        alert('test_event');
        console.log('test');
    });

Echo
    .channel('admins')
    .listen('PostUpdatedEvent', e => {
        Swal.fire('Hello world!')
    });
