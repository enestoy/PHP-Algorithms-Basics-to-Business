<?php

// The tape is used to store the data on which the operation will be performed.
// Initially, we will store the number to operate on in this tape.
$tape = ['1', '0', '1']; // Number 101 (5)

$currentState = 'start'; // The current state of the Turing machine
$headPosition = 0; // The head starts at the first cell of the tape
$allStates = ['start', 'multiplication', 'result']; // The states of the machine

// Transition function: Determines the next state based on the current symbol
$transitionFunction = [
    'start' => function($symbol) {
        if ($symbol == '1') {
            return ['multiplication', '1', 'right'];
        } elseif ($symbol == '0') {
            return ['result', '0', 'right'];
        }
        return ['start', $symbol, 'right'];
    },
    'multiplication' => function($symbol) {
        return ['multiplication', $symbol, 'right'];
    },
    'result' => function($symbol) {
        return ['result', $symbol, 'halt'];
    }
];

// Function to run the Turing machine
function runTuringMachine($tape, $currentState, $headPosition, $transitionFunction) {
    // Limit the number of steps to avoid an infinite loop
    $stepCount = 0;
    $maxSteps = 100;

    while ($stepCount < $maxSteps) {
        $symbol = isset($tape[$headPosition]) ? $tape[$headPosition] : 'blank'; // The symbol read by the head
        // Use the transition function to determine the new state, symbol, and movement
        list($newState, $newSymbol, $move) = $transitionFunction[$currentState]($symbol);

        // Update the tape with the new symbol
        if ($newSymbol != 'blank') {
            $tape[$headPosition] = $newSymbol;
        }

        // Change the state
        $currentState = $newState;

        // Move the head (right or left)
        if ($move == 'right') {
            $headPosition++;
        } elseif ($move == 'left') {
            $headPosition--;
        }

        // Break the loop if the process ends
        if ($currentState == 'result') {
            break;
        }

        $stepCount++;
    }

    return $tape;
}

// Run the Turing machine
$tapeResult = runTuringMachine($tape, $currentState, $headPosition, $transitionFunction);

// Print the results
echo "Result tape: ";
echo implode('', $tapeResult); // Print the final result to the screen

?>
