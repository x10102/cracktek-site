//Vykradeno ze stackoverflow

function HSVtoRGB(h, s, v) {
    var r, g, b, i, f, p, q, t;
    if (arguments.length === 1) {
        s = h.s, v = h.v, h = h.h;
    }
    i = Math.floor(h * 6);
    f = h * 6 - i;
    p = v * (1 - s);
    q = v * (1 - f * s);
    t = v * (1 - (1 - f) * s);
    switch (i % 6) {
        case 0: r = v, g = t, b = p; break;
        case 1: r = q, g = v, b = p; break;
        case 2: r = p, g = v, b = t; break;
        case 3: r = p, g = q, b = v; break;
        case 4: r = t, g = p, b = v; break;
        case 5: r = v, g = p, b = q; break;
    }
    return {
        r: Math.round(r * 255),
        g: Math.round(g * 255),
        b: Math.round(b * 255)
    };
}

function scale (number, inMin, inMax, outMin, outMax) {
    return (number - inMin) * (outMax - outMin) / (inMax - inMin) + outMin;
}

function checkval(value) {
    if(value == 0) {
        return "00";
    } else {
        return value.toString(16);
    }
}

//Tohle uz ne to jsem napsal sam jsem skvelej
for(let i = 0; i < 5; i++) {
    $(".graphsec").append(`<div class=\"barg-outer\"><div class="barg-inner" id="bi${i}"></div></div>`);
    let percentage = Math.floor(Math.random() * 101);
    let current = $(`#bi${i}`);
    current.css("height", `${percentage}%`);
    let rggb = HSVtoRGB(percentage/200, 1, 1);
    current.css("background", `#${checkval(rggb.r)}${checkval(rggb.g)}${checkval(rggb.b)}`);
}

