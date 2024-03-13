<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" type="text/css" href="" />
  <script type="module" src="" defer></script>
  <title>Document</title>
</head>

<body>
  <header>
    <h1>Page des infos</h1>
  </header>
  <main>

    <div id="liveAlertPlaceholder"></div>
    <button type="button" class="btn btn-primary" id="liveAlertBtn">Voir mon code unique de bénévole</button>


  </main>
  <footer></footer>
  <script>
    const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
    const appendAlert = (message, type) => {
      const wrapper = document.createElement('div')
      wrapper.innerHTML = [
        `<div class="alert alert-${type} alert-dismissible" role="alert">`,
        `   <div>${message}</div>`,
        '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
        '</div>'
      ].join('')

      alertPlaceholder.append(wrapper)
    }

    const alertTrigger = document.getElementById('liveAlertBtn')
    if (alertTrigger) {
      alertTrigger.addEventListener('click', () => {
        appendAlert('Merci pour votre inscription chez nous! Voici votre code unique :', 'success')
      })
    }
  </script>
</body>

</html>