module.exports = {
  content: [
    './layouts/**/*.html',
    './templates/**/*.html',
    './include/**/*.html',
    './src/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        'gemini-cyan': '#29D0E0',
        'gemini-navy': '#1A2B4C',
        'gemini-coral': '#FF6B6B',
        'gemini-ice': '#F5FAFB',
      },
      fontFamily: {
        'rounded': ['"Zen Maru Gothic"', 'sans-serif'],
        'english': ['"Varela Round"', 'sans-serif'],
      },
      borderRadius: {
        'bubble': '24px 24px 4px 24px',
      },
      animation: {
        'wiggle': 'wiggle 1s ease-in-out infinite',
      },
      keyframes: {
        wiggle: {
          '0%, 100%': { transform: 'rotate(-3deg)' },
          '50%': { transform: 'rotate(3deg)' },
        }
      }
    },
  },
  plugins: [],
}
