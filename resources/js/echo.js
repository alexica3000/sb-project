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
        let text = `The post <strong>${e.post.title}</strong> has been modified.<br>`;
        let link = `Post - <a href="/posts/show/${e.post.id}"> ${e.post.title}</a>`;
        let before = JSON.stringify(e.history.before);
        let after = JSON.stringify(e.history.after);
        let htmlBody = `${text}Before: ${before}<br>After: ${after}`

        Swal.fire({
            icon: 'info',
            title: 'Hello,',
            html: htmlBody,
            footer: link})
    });
