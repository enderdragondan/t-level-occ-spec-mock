async function fetchWeather(latitude, longitude) {
	return fetch("./includes/weather.php", {
		method: "POST",
		headers: { "Content-Type": "application/json" },
		body: JSON.stringify({ latitude: latitude, longitude: longitude }),
	})
		.then((response) => response.json())
		.then((data) => {
			if (data.error) {
				console.error("Error:", data.error);
				return "error";
			} else {
				return data;
			}
		})
		.catch((error) => {
			console.error("Error:", error);
			return "error";
		});
}

async function fetchWeatherData() {
	if (navigator.geolocation) {
		try {
			const position = await new Promise((resolve, reject) => {
				navigator.geolocation.getCurrentPosition(resolve, reject);
			});
			const data = await fetchWeather(
				position.coords.latitude,
				position.coords.longitude
			);
			if (data !== "error") {
				return data;
			} else {
				document.getElementById("weather-error").innerHTML =
					"Error retrieving weather data.";
				document.getElementById("weather-result").innerHTML = "";
				return null;
			}
		} catch (error) {
			document.getElementById("weather-error").innerHTML =
				"Location access denied. Please allow access to use our services.";
			document.getElementById("weather-result").innerHTML = "";
			return null;
		}
	} else {
		document.getElementById("weather-error").innerHTML =
			"Your device is not supported. Please use a device with GPS capabilities.";
		document.getElementById("weather-result").innerHTML = "";
		return null;
	}
}

document.addEventListener("DOMContentLoaded", async () => {
	let currentHour = new Date().getHours();
	let currentDay = new Date().getDay();

	let dayIndex = (currentDay + 6) % 7;
	const days = ["Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"];
	let orderedDays = days.slice(dayIndex).concat(days.slice(0, dayIndex));

	orderedDays.forEach((day, i) => {
		let dayDiv = document.getElementById("day" + (i + 1));
		if (dayDiv) {
			dayDiv.querySelector("h1").innerText = day;
		}
	});

	const day1 = document.querySelector("#day1");
	const day1h1 = document.querySelector("#day1 h1");
	const day1hr = document.querySelector("#day1 hr");

	day1.classList.add("activeSelection");
	day1h1.classList.add("has-text-warning");
	day1hr.classList.add("has-background-warning");

	const time1 = document.getElementById("time" + currentHour);
	const time1h1 = time1.querySelector("h1");
	const time1hr = time1.querySelector("hr");

	time1.classList.add("activeSelection");
	time1h1.classList.add("has-text-warning");
	time1hr.classList.add("has-background-warning");

	const containerTime = document.querySelector("#timeSelector");
	const containerTimeParent = containerTime.parentElement;
	const selectedTime = containerTime.querySelector(".has-text-warning");
	if (containerTimeParent && selectedTime) {
		const containerRect = containerTimeParent.getBoundingClientRect();
		const selectedRect = selectedTime.getBoundingClientRect();

		let offset =
			selectedRect.left -
			containerRect.left -
			containerRect.width / 2 +
			selectedRect.width / 2;
		const maxScrollLeft =
			containerTimeParent.scrollWidth - containerTimeParent.clientWidth;
		containerTimeParent.scrollLeft = Math.min(
			Math.max(containerTimeParent.scrollLeft + offset, 0),
			maxScrollLeft
		);
	}

	const containerDay = document.querySelector("#daySelector");
	const containerDayParent = containerDay.parentElement;
	const selectedDay = containerDay.querySelector(".has-text-warning");
	if (containerDayParent && selectedDay) {
		const containerRect = containerDayParent.getBoundingClientRect();
		const selectedRect = selectedDay.getBoundingClientRect();

		let offset =
			selectedRect.left -
			containerRect.left -
			containerRect.width / 2 +
			selectedRect.width / 2;
		const maxScrollLeft =
			containerDayParent.scrollWidth - containerDayParent.clientWidth;
		containerDayParent.scrollLeft = Math.min(
			Math.max(containerDayParent.scrollLeft + offset, 0),
			maxScrollLeft
		);
	}

	containerTime.parentElement.addEventListener(
		"wheel",
		function (e) {
			e.preventDefault();
			containerTime.parentElement.scrollLeft += e.deltaY;
		},
		{ passive: false }
	);

	containerDay.parentElement.addEventListener(
		"wheel",
		function (e) {
			e.preventDefault();
			containerDay.parentElement.scrollLeft += e.deltaY;
		},
		{ passive: false }
	);

	containerTime.querySelectorAll("div").forEach((timeDiv) => {
		timeDiv.addEventListener("click", () => {
			if (
				timeDiv
					.querySelector("h1")
					.classList.contains("has-text-warning")
			) {
				return;
			} else {
				const selectedTime =
					containerTime.querySelector(".has-text-warning");
				if (selectedTime) {
					selectedTime.parentElement.classList.remove("activeSelection");
					selectedTime.classList.remove("has-text-warning");
					containerTime
						.querySelector(".has-background-warning")
						.classList.remove("has-background-warning");
				}
				timeDiv.classList.add("activeSelection");
				timeDiv.querySelector("h1").classList.add("has-text-warning");
				timeDiv
					.querySelector("hr")
					.classList.add("has-background-warning");
				timeSelected = parseInt(timeDiv.id.slice(-2));
				updateWeatherDetails(timeSelected + daySelected * 24);
			}
		});
	});

	containerDay.querySelectorAll("div").forEach((dayDiv) => {
		dayDiv.addEventListener("click", () => {
			if (
				dayDiv
					.querySelector("h1")
					.classList.contains("has-text-warning")
			) {
				return;
			} else {
				const selectedDay =
					containerDay.querySelector(".has-text-warning");
				if (selectedDay) {
					selectedDay.parentElement.classList.remove("activeSelection");
					selectedDay.classList.remove("has-text-warning");
					containerDay
						.querySelector(".has-background-warning")
						.classList.remove("has-background-warning");
				}
				dayDiv.classList.add("activeSelection");
				dayDiv.querySelector("h1").classList.add("has-text-warning");
				dayDiv
					.querySelector("hr")
					.classList.add("has-background-warning");
				daySelected = parseInt(dayDiv.id.slice(-1)) - 1;
				updateWeatherDetails(timeSelected + daySelected * 24);
			}
		});
	});

	function updateWeatherDetails(index) {
		if (index === currentHour) {
			document.getElementById("time-warning").innerHTML = ``;
		} else {
			document.getElementById("time-warning").innerHTML = `
			Advice is based on the selected date and time, not the current date and time. Please keep this in mind!
			`;
		}
		document.getElementById("weather-result").innerHTML = `
		<strong>Temperature:</strong> ${weatherInfo.temperature[index]}°C <br>
		<strong>Feels Like:</strong> ${weatherInfo.apparent_temperature[index]}°C <br>
		<strong>Humidity:</strong> ${weatherInfo.humidity[index]}% <br>
		<strong>UV Index:</strong> ${weatherInfo.uv_index[index]} <br>
		`;
		document.getElementById("advice-result").innerHTML = `
		You have no recommendations! Enjoy your day!
		`;
	}

	let timeSelected = currentHour;
	let daySelected = 0;
	let weatherInfo = await fetchWeatherData();

	await new Promise((resolve) => setTimeout(resolve, 1250));
	updateWeatherDetails(timeSelected + daySelected * 24);
});
