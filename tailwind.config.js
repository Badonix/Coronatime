/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            minWidth: {
                24: "24px",
            },
            maxWidth: {
                24: "24px",
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
