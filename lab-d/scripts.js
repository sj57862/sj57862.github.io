const GET_WEATHER_BTN = document.getElementById('get-weather-btn');
const CITY_INPUT = document.getElementById('inp-weather');
const WEATHER_CONTAINER = document.getElementById('weather-container');

class WeatherCastNODE{
    constructor(city,date,temperature,felt,description){
      const template = document.querySelector('.wc-temp');
      this.root = template.content.firstElementChild.cloneNode(true);

      this.root.querySelector('.wc-city').textContent = city;
      this.root.querySelector('.wc-date').textContent = date;
      this.root.querySelector('.wc-temperature').textContent = temperature+"°C" ;
      this.root.querySelector('.wc-felt').textContent = felt+"°C" ;
      this.root.querySelector('.wc-description').textContent = description;
    }

    get_NODE(){
      return this.root;
    }
}

function getWeatherXML(city) {
  return new Promise((resolve, reject) => {
    try {
      const xhr = new XMLHttpRequest();
      xhr.open('GET', `https://api.openweathermap.org/data/2.5/forecast?q=${city}&appid=4c3f0b491dcc8195d0f63e1161a6b0d9&units=metric&lang=pl`, true);

      xhr.onload = () => {
        if (xhr.status === 200) {
          resolve(JSON.parse(xhr.responseText));
        }
      };

      xhr.send();
    } catch (e) {
      reject(new Error("cos poszlo nie tak przy fetchowaniu"));
    }
  });
}
async function getWeather(city) {
  try {
    const response = await fetch(`https://api.openweathermap.org/data/2.5/forecast?q=${city}&appid=4c3f0b491dcc8195d0f63e1161a6b0d9&units=metric&lang=pl`);
    if (response.ok){
      return await response.json();
    }
  }catch (e) {
    throw new Error("cos poszlo nie tak przy fetchowaniu")
  }
}

GET_WEATHER_BTN.addEventListener('click', async () => {
  const city = CITY_INPUT.value.trim() || " ";
  const data = await getWeather(city);

  if(data){
    console.log(data);
    WEATHER_CONTAINER.innerHTML = '';
    for(const wc of data.list){
      const wcNode = new WeatherCastNODE(
        data.city.name,
        wc.dt_txt,
        wc.main.temp,
        wc.main.feels_like,
        wc.weather[0].description
      );
      WEATHER_CONTAINER.appendChild(wcNode.get_NODE());
    }
  }
})

