let tally = 0;

for (let x = 1; x < 5; x++) {
  let count = document.getElementById("C" + x).innerHTML;
  console.log(count);
  count = count.match(/\d+/)[0];
  console.log(count);
  tally += +count;
}

console.log(tally);
