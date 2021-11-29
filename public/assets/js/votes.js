
// table_data = {
//     'Blue': [
//         {'City': 'Anchorage', 'Votes': 10000,  'Color': 'Blue'},
//         {'City': 'Brooklyn',  'Votes': 250000, 'Color': 'Blue'}
//     ],
//     'Green': [
//     ],
//     ...
// }
const table_data = {};

// Helper function
// Array sum
// ex. [1,2,3] => 6
const sum = (arr) => arr.reduce((prev, curr) => prev + curr, 0);

// Helper function
// Pretty-format numbers
// ex. 12345678 => 12,345,678
const nice_number = (num) => Number(num).toLocaleString();

// Fetch data and show
function get_and_show_votes_for_color(color) {
    fetch(`votes.php?color=${color}`)
        .then(body => body.json())
        .then(data => show_votes_for_color(color, data.results));
}

function show_votes_for_color(color, votes) {

    // Remember the data
    table_data[color] = votes;

    const text =
        (votes.length === 0)
        ? '(No Votes)'
        : votes.map((data) => `${data.City}: ${nice_number(data.Votes)}`).join('; ');

    // Sum of all votes for this color
    const total = sum( votes.map(data => data.Votes) );

    const td_color_votes = document.querySelector(`.color-votes[data-color="${color}"] span`);
    const td_color_votes_total = document.querySelector(`.color-votes-total[data-color="${color}"] span`);
    td_color_votes.innerHTML = text;
    td_color_votes_total.innerHTML = nice_number(total);

    // With new data, recalculate grand total
    update_grand_total();
}

function update_grand_total() {
    grand_total = 0;
    for (const color in table_data) {
        grand_total += sum( table_data[color].map(data => data.Votes) );
    }
    
    const td_votes_total = document.querySelector('#votes-total span');
    td_votes_total.innerHTML = nice_number(grand_total);
}


// Make color names clickable
const color_links = document.querySelectorAll('td.color-name');
color_links.forEach(function(elem) {
    const link = elem.querySelector('span.link');
    link.addEventListener('click', function() {
        // On click, fetch data to be displayed
        const color = elem.dataset.color;
        get_and_show_votes_for_color(color);
    });
});

// Make TOTAL clickable
const total_link = document.querySelector('span#total-link');
total_link.addEventListener('click', function() {
    // Show all hidden elements
    document.querySelectorAll('.hidden').forEach((e) => e.classList.remove('hidden'));
});

// Set the initial grand total to 0
document.querySelector('#votes-total span').innerHTML = '0';