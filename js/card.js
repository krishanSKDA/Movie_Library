const movies = [
    {
        id: 1,
        title: 'Batman Returns',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed diam convallis aliquot tempor volutpat ut...',
        image: 'assets/movie/batman.jpg'
    },
    {
        id: 2,
        title: 'Wild Wild West',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed diam convallis aliquot tempor volutpat ut...',
        image: 'assets/movie/wild.jpg'
    },
    {
        id: 3,
        title: 'The Amazing Spiderman',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed diam convallis aliquot tempor volutpat ut...',
        image: 'assets/movie/spider.jpg'
    }
];

const movieGrid = document.getElementById('movieGrid');
const searchInput = document.getElementById('searchInput');

// Create movie card element
function createMovieCard(movie) {
    const card = document.createElement('div');
    card.className = 'movie-card';
    card.innerHTML = `
        <div class="movie-image">
            <img src="${movie.image}" alt="${movie.title}">
            <button class="close-button" data-id="${movie.id}"></button>
        </div>
        <div class="movie-content">
            <h2 class="movie-title">${movie.title}</h2>
            <p class="movie-description">${movie.description}</p>
        </div>
    `;
    return card;
}

// Render movies in the grid
function renderMovies(moviesToRender) {
    movieGrid.innerHTML = '';
    moviesToRender.forEach(movie => movieGrid.appendChild(createMovieCard(movie)));
}

// Handle search input
searchInput.addEventListener('input', async (e) => {
    const searchTerm = e.target.value.toLowerCase();
    const filteredMovies = movies.filter(movie =>
        movie.title.toLowerCase().includes(searchTerm)
    );

    if (searchTerm.trim() !== '') {
        const apiMovies = await fetchMoviesFromAPI(searchTerm);
        apiMovies.forEach(movie => {
            if (!movies.some(m => m.id === movie.id)) {
                movies.push(movie); 
            }
        });
        renderMovies([...filteredMovies, ...apiMovies]);
    } else {
        renderMovies(movies);
    }
});

// Fetch movies from the API
async function fetchMoviesFromAPI(query) {
    const response = await fetch(`http://api.tvmaze.com/search/shows?q=${query}`);
    const data = await response.json();
    return data.map(item => ({
        id: item.show.id,
        title: item.show.name,
        description: item.show.summary ? item.show.summary.replace(/<\/?[^>]+(>|$)/g, "") : 'No description available.',
        image: item.show.image ? item.show.image.medium : 'assets/movie/default.jpg'
    }));
}

// Handle remove button click
movieGrid.addEventListener('click', (e) => {
    const id = parseInt(e.target.dataset.id);
    if (e.target.classList.contains('close-button')) {
        const index = movies.findIndex(movie => movie.id === id);
        if (index > -1) {
            movies.splice(index, 1);
            renderMovies(movies);
        }
    }
});


renderMovies(movies);