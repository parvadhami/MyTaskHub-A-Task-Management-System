function search() {
    var searchTerm = document.getElementById('searchInput').value;
    var searchResults = document.getElementById('searchResults');
  
    // Clear previous results
    searchResults.innerHTML = '';
  
    // Perform search operation (e.g., fetching data from server, filtering items, etc.)
    // For demonstration purposes, let's just display the search term
    searchResults.innerHTML = "<p>Search Results for: " + searchTerm + "</p>";
  }
  