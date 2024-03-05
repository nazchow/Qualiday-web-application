const fetchWeather = () => {
    const url = 'https://api.openweathermap.org/data/2.5/weather?lat=28.538336&lon=-81.379234&appid=1f2729d287c41e3611e3d572b87089e6';
  
    fetch(url)
      .then(function(resp) {
        return resp.json();
      })
      .then(function(data) {
        displayWeather(data);
      })
      .catch(function(error) {
        console.log('Error:', error);
      });
  };
  
  const displayWeather = (d) => {
    let kelvin = d.main.temp;
    let fahrenheit = Math.round(((kelvin - 273.15) * 9/5) + 32);
    let description = d.weather[0].description;
  
    document.getElementById('description').innerHTML = description;
    document.getElementById('temp').innerHTML = fahrenheit + '°F';
    document.getElementById('location').innerHTML = d.name;
  };
  
  window.onload = fetchWeather;