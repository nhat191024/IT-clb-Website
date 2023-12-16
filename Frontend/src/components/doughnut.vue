<template>
    <Doughnut :data="chartData" :options="chartOptions" />
</template>

<script setup>
import { Doughnut } from 'vue-chartjs'

const chartData = {
    labels: ['Red', 'Blue', 'Yellow'],
    datasets: [{
        data: [20, 30, 50],
        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
        hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
    }]
}

const chartOptions = {
    responsive: true
    // Add other chart options here as needed
}
</script>
