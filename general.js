document.addEventListener("DOMContentLoaded", () => {
	const burger = document.querySelector(".navbar-burger");
	const menu = document.querySelector(".navbar-menu");

	if (burger && menu) {
		burger.addEventListener("click", () => {
			burger.classList.toggle("is-active");
			menu.classList.toggle("is-active");
		});
	}

	const dropdowns = document.querySelectorAll(".navbar-item.has-dropdown");
	dropdowns.forEach((dropdown) => {
		dropdown.addEventListener("click", () => {
			dropdown.classList.toggle("is-active");
		});
	});

	const html = document.querySelector("html");
	const themeButton = document.getElementById("themeButton");
	const logo = document.getElementById("logonavbar");

	const setTheme = (theme) => {
		if (theme === "dark") {
			html.classList.remove("theme-light");
			html.classList.add("theme-dark");
			logo.innerHTML =
				'<img width="150px" src="../assets/images/full_logo.png" alt="Logo" style="filter: invert(1);">';
			themeButton.innerHTML =
				'<img width="25px" height="25px" src="../assets/icons/theme_switcher.png" alt="Theme" style="filter: invert(1);">';
		} else {
			html.classList.remove("theme-dark");
			html.classList.add("theme-light");
			logo.innerHTML =
				'<img src="../assets/images/full_logo.png" width="150px" alt="Logo">';
			themeButton.innerHTML =
				'<img width="25px" height="25px" src="../assets/icons/theme_switcher.png" alt="Theme">';
		}
	};

	const storedTheme = localStorage.getItem("theme");

	if (storedTheme) {
		setTheme(storedTheme);
	} else {
		const systemTheme = window.matchMedia("(prefers-color-scheme: dark)")
			.matches
			? "dark"
			: "light";
		setTheme(systemTheme);
	}

	themeButton.addEventListener("click", () => {
		if (html.classList.contains("theme-dark")) {
			setTheme("light");
			localStorage.setItem("theme", "light");
		} else {
			setTheme("dark");
			localStorage.setItem("theme", "dark");
		}
	});

	const heroFoot = document.querySelector(".hero-foot");

	heroFoot.addEventListener("animationend", () => {
		heroFoot.classList.remove("animate__delay-1s");
	});

	window.addEventListener("scroll", () => {
		if (window.scrollY > 0) {
			heroFoot.classList.remove("animate__fadeInDown");
			heroFoot.classList.add("animate__fadeOutUp");
		} else {
			heroFoot.classList.remove("animate__fadeOutUp");
			heroFoot.classList.add("animate__fadeInDown");
		}
	});
});
