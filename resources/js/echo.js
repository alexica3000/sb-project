Echo
    .channel('test')
    .listen('TestEvent', e => {
        alert('test');
        console.log('test');
    });
