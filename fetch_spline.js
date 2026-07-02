fetch('https://my.spline.design/r4xbot-AoDulhrnZSyUol2dKhZaFKSY/').then(r=>r.text()).then(t=>{console.log(t.match(/https:\/\/[a-zA-Z0-9.\/-]+\.splinecode/));})
