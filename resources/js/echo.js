Echo
    .channel('post_updated')
    .listen('PostUpdatedEvent', e => {
        alert('test');
        console.log('test');
    });
