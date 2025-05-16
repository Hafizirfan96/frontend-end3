/** @type {import('tailwindcss').Config} */

export default {
  content: ["./index.html", "./src/**/*.{js,ts,jsx,tsx}"],
  darkMode: "class",
  theme: {
    extend: {
      boxShadow: {
        basic: "1px 1px 10px 2px rgba(0,0,0,0.1)",
      },
      fontFamily: {
        poppins: ["Poppins", "sans-serif", "Merienda"],
        merienda: ['Merienda', 'sans-serif'],
      },
      fontSize: {
        base: "16px",
        subHeading: "20px"

      },
      container: {
        center: true,
        padding: {
          DEFAULT: "77px",
        },
      },
      screens: {
        xl: "1440px",
      },
      maxWidth: {
        container: "1440px",
      },

      colors: {
        "cs-primary-text": "#049b63",
        "cs-secondary": "#049b63",
        "cs-primary": "#049b63",
        "cs-background-color": "#F5F5F5",
        "cs-border-color": "#DEDEDE",
        "cs-light": "#191919",
        "cs-gradient": "#FDD4D4",
        "cs-button-background": "#F2F2F2",
        "cs-button-background-dark": "#a8a8a8",
        "cs-primary-color": "#ffA500",
        "cs-green": "#03781D",
        "cs-error": "#FF0000",
        "cs-light-grey-banner": "#474747",
        "cs-light-black": "#686868",
        "cs-light-text": "#555555",
        "cs-light-text-color": "#525151",
        "cs-light-gray": "#ebebeb",
        "cs-gray": "#313131",
        "cs-black": "#000000",
        "cs-white": "#FFFFFF",
      },
    },
  },
  plugins: [],
};
