/** @type {import('tailwindcss').Config} */
export default {
    mode: "jit",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                "blue-primary": "#54ADFF",
                "gray-primary": "#F9F9F9",
            },
        },
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: false, // true: all themes | false: only light + dark | array: specific themes like this ["light", "dark", "cupcake"]
        darkTheme: "light", // name of one of the included themes for dark mode
        // base: true, // applies background color and foreground color for root element by default
        // styled: true, // include daisyUI colors and design decisions for all components
        // utils: true, // adds responsive and modifier utility classes
        // rtl: false, // rotate style direction from left-to-right to right-to-left. You also need to add dir="rtl" to your html tag and install `tailwindcss-flip` plugin for Tailwind CSS.
        // prefix: "",
        logs: true,
    },
};
