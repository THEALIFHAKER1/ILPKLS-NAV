/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,js,php}", "./Components/**/*.{html,js,php}"],
  darkmode: "class",
  theme: {
    extend: {
      colors: {
        text: "var(--text)",
        background: "var(--background)",
        primary: "var(--primary)",
        secondary: "var(--secondary)",
        accent: "var(--accent)",
      },
    },
  },
  plugins: [],
};
