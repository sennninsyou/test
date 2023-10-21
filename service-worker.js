function base64Decode(text,charset){
    return fetch(`data:text/plain;charset=${charset};base64,`+text).then(response=>response.text());
  }
  // プッシュ通知を受け取ったときのイベント
  self.addEventListener('push', async function (event) {
      //serverからのメッセージ
      var msg=event.data.text();
      msg=await base64Decode(msg);
      msg=msg.split('!|!');
      const title = msg[0];
      const options = {
          body: msg[1], // メッセージ
          tag: msg[2], // 通知固有のタグ(このプログラムではURLの伝達に使用)
          icon: 'icon.png', // アイコン
          badge: 'icon.png' // アイコン(縮小版)
      };
      event.waitUntil(self.registration.showNotification(title, options));
  });
  
  // プッシュ通知のクリックイベント
  self.addEventListener('notificationclick', function (event) {
      var notification_url=event.notification.tag;//通知に関連付けられているURL
      event.notification.close();
  
      event.waitUntil(
          // プッシュ通知をクリックしたときに開くURL
          clients.openWindow(notification_url)
      );
  });
  
  
  // Service Worker インストール時に実行
  self.addEventListener('install', (event) => {
      console.log('service worker install ...');
  });