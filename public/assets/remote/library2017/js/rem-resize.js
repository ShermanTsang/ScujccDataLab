let htmlWidth = document.documentElement.clientWidth || document.body.clientWidth; let htmlHeight = document.documentElement.clientHeight || document.body.clientHeight; let htmlElm = document.getElementsByTagName('html')[0]; let fontSize = htmlWidth / 10 > 64 ? 64 : htmlWidth / 10; htmlElm.style.fontSize = fontSize + 'px';