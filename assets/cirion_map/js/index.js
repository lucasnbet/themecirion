// MAP

const planet = document.querySelector('#planet');
const hotspot = document.querySelector('.hotspot');

planet.addEventListener('load', () => {

  planet.cameraOrbit = "295deg 90deg 1m"

  // hotspot.addEventListener('click', () => {
  //   console.log('cliqueo');
  //   planet.cameraOrbit = hotspot.dataset.position;
  // })

  // console.log(planet.queryHotspot('hotspot-planet'));

  const material = planet.model.materials[0];

  const card1 = document.querySelector('#card1');
  const card2 = document.querySelector('#card2');
  const card3 = document.querySelector('#card3');
  const card4 = document.querySelector('#card4');

  const info0 = document.querySelector('#info0');
  const info1 = document.querySelector('#info1');
  const info2 = document.querySelector('#info2');
  const info3 = document.querySelector('#info3');
  const info4 = document.querySelector('#info4');

  const placeTexture = async (url) => {
    const texture = await planet.createTexture(url);
    material.pbrMetallicRoughness['baseColorTexture'].setTexture(texture);
  }

  const clearActives = () => {
    const cards = document.querySelectorAll('.card');
    const infos = document.querySelectorAll('.info');
    
    for (var item of cards) {
      item.classList.remove('active');
    }

    for (var item of infos) {
      item.classList.remove('active');
    }
  }

  const clickCard = (event, texture) => {
    const card = event.target.closest('.card');
    const active = card.classList.contains('active');

    clearActives();

    if (active) {
      placeTexture('img/mapa-full.png');
      info0.classList.add('active');
    } else {
      placeTexture(texture);
      card.classList.add('active');

      if (card.id == 'card1') {
        info1.classList.add('active');
      } else if (card.id == 'card2') {
        info2.classList.add('active');
      } else if (card.id == 'card3') {
        info3.classList.add('active');
      } else if (card.id == 'card4') {
        info4.classList.add('active');
      }
    }
  }

  card1.addEventListener('click', (event) => {
    clickCard(event, 'img/mapa-network.png');
  });

  card2.addEventListener('click', (event) => {
    clickCard(event, 'img/mapa-cdn.png');
  });

  card3.addEventListener('click', (event) => {
    clickCard(event, 'img/mapa-datacenter.png');
  });

  card4.addEventListener('click', (event) => {
    clickCard(event, 'img/mapa-teleports.png');
  });
});

// LANG 

const url = window.parent.location.href;

let es = url.includes('/es-');
let en = url.includes('/en-');
let pt = url.includes('/pt-');

if (es) {
  lang = 'lang/es.json';
} else if (en) {
  lang = 'lang/en.json';
} else if (pt) {
  lang = 'lang/pt.json';
} else {
  lang = 'lang/es.json';
}

fetch(lang)
.then(response => response.json())
.then(data => {
  const data_ids = document.querySelectorAll('[data-id]');
  
  for (const data_id of data_ids) {
    const id = data_id.dataset.id;
    const text = data_id.dataset.text;

    data_id.innerHTML = data[id][text];
  }
})