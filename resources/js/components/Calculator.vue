<template>
    <div class="flex items-center bg-gray justify-center h-screen w-screen">
        <div class="p-3 max-w-md w-full">
            <!-- Calculator result -->

            <div
                class="rounded p-3 text-right font-bold text-white bg-secondary"
            >
                {{ calculatorValue || 0 }}
            </div>

            <!-- Calculator buttons -->
            <div class="grid grid-cols-4 pt-2 gap-1">
                <div v-for="n in calculatorElements" :key="n">
                    <div
                        class="text-white select-none text-center py-3 bg-secondary rounded hover-class"
                        :class="{
                            'bg-primary': isOperator(n),
                        }"
                        @click="action(n)"
                    >
                        {{ n }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref} from "vue";

const calculatorValue = ref("");
const calculatorElements = ref([
    "C",
    "*",
    "/",
    "-",
    7,
    8,
    9,
    "+",
    4,
    5,
    6,
    "%",
    1,
    2,
    3,
    "=",
    0,
    ".",
]);
const operator = ref(null);

const previousCalculatorValue = ref("");

const isOperator = (n) => ["C", "*", "/", "-", "+", "%", "="].includes(n);

const action = (n) => {
    /* Append value */
    if (!isNaN(n) || n === ".") {
        calculatorValue.value += n + "";
    }

    /* Clear value */
    if (n === "C") {
        calculatorValue.value = "";
    }

    /* Percentage */
    if (n === "%") {
        calculatorValue.value = calculatorValue.value / 100 + "";
    }

    /* Operators */
    if (["/", "*", "-", "+"].includes(n)) {
        operator.value = n;
        previousCalculatorValue.value = calculatorValue.value;
        calculatorValue.value = "";
    }

    /* Calculate result using the eval function */
    if (n === "=") {
        if (
            !previousCalculatorValue.value ||
            !operator.value ||
            !calculatorValue.value
        )
            return;

        if (previousCalculatorValue.value == 0 && operator.value === "/") return;
        calculatorValue.value = eval(
            previousCalculatorValue.value +
            operator.value +
            calculatorValue.value
        );
        previousCalculatorValue.value = "";
        operator.value = null;
    }
};
</script>
