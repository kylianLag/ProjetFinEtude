document.addEventListener("DOMContentLoaded", () => {
    const arcProgressList = document.querySelectorAll(".arc-progress");

    arcProgressList.forEach((arcProgress) => {
        const percentage = parseInt(arcProgress.dataset.percentage);

        const progress = arcProgress.querySelector(".progress");
        const radius = 50; // Rayon défini dans le SVG
        const circumference = Math.PI * radius;
        const offset = circumference - (percentage / 100) * circumference;

        progress.style.strokeDasharray = circumference;
        progress.style.strokeDashoffset = offset;

        // Couleurs dynamiques en fonction du pourcentage
        if (percentage >= 75) {
            progress.style.stroke = "#006400"; // Vert foncé
        }else if (percentage >= 66) {
            progress.style.stroke = "#32CD32"; // Vert clair
        } else if (percentage >= 50) {
            progress.style.stroke = "#e5e534"; // Jaune clair
        } else if (percentage >= 25) {
            progress.style.stroke = "#FFA500"; // Orange
        } else {
            progress.style.stroke = "#FF4500"; // Rouge
        }
    });
});
