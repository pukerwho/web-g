module.exports = {
  mode: "jit",
  content: ["./**/*.php", "./src/**/*.js"],
  safelist: ["bg-yellow-100", "text-3xl", "lg:text-4xl"],
  darkMode: "class", // or 'media' or 'class'
  theme: {
    zIndex: {
      1: 1,
      2: 2,
      10: 10,
    },
    listStyleType: {
      auto: "auto",
      none: "none",
      disc: "disc",
      decimal: "decimal",
      square: "square",
    },
    extend: {
      lineHeight: {
        12: "3rem",
        16: "4rem",
      },
      colors: {
        "dark-md": "#2a2c31",
        "dark-lg": "#222529",
        "dark-xl": "#1b1e21",
      },
    },
  },
  variants: {
    extend: {},
  },
  // plugins: [require('@tailwindcss/typography')],
};
