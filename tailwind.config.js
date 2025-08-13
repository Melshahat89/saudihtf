module.exports = {
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./vendor/laravel/jetstream/**/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
  ],

  theme: {
    extend: {
      colors: {
        green: "#00afab",
        blue: "#326478",
        coolgrey: "#F0F0F0",
        grey: "#DDDDDD",
        darkgrey: "#AFAFAF",
        babydark: "#464646",
        lightgrey: "#D9D9D9",
      },
    },
  },

  plugins: [require("daisyui")],
};
