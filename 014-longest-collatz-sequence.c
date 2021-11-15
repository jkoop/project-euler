#include <stdio.h>
#include <stdlib.h>

// https://projecteuler.net/problem=14
// The following iterative sequence is defined for the set of positive integers:
// n → n/2 (n is even)
// n → 3n + 1 (n is odd)
// Using the rule above and starting with 13, we generate the following sequence:
// 13 → 40 → 20 → 10 → 5 → 16 → 8 → 4 → 2 → 1
// It can be seen that this sequence (starting at 13 and finishing at 1) contains 10 terms. Although it has not been proved yet (Collatz Problem), it is thought that all starting numbers finish at 1.
// Which starting number, under one million, produces the longest chain?

void main() {
	int max_length = 0;
	int max_number = 0;

	for (int i = 1; i < 1000000; i++) {
		int length = 1;
		int number = i;

		while (number != 1) {
			if (number % 2 == 0) {
				number = number / 2;
			} else {
				number = 3 * number + 1;
			}

			length++;
		}

		if (length > max_length) {
			max_length = length;
			max_number = i;
		}

		printf("%i %i :: %i %i\n", max_number, max_length, i, length);
	}
}
