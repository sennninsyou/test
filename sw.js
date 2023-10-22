self.addEventListener("push", (event) => {
    const notification = event.data.json();

    event.waitUntil(self.ServiceWorkerRegistration.showNotification(notification.title , {
        body:notification.body,
        icon:"icon.png",
        data:{
            notifURL:notification.url
        }
    }));
});

self.addEventListener("notificationclick", (event) => {
    event.waitUntil(clients.openWindow(event.notification.data.notifURL));
});