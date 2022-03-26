
;~ function($) {
    let domPool = [];
    let hasPosition = [];
    let barrage = function(opt) {
        let defaultOpt = {
            max_dm_count: 3, 
            channel_count: 5, 
            allow_repeat: 1, 
            danmuPool: [],
            danmuTpl: function(danmuPool) {
                return danmuPool;
            }
        }
        let options = $.extend({}, defaultOpt, opt);
        return this.each(function() {
            init(this, options);
            setInterval(() => {
                let channel;
                if (options.danmuPool.length && (channel = getChannel(options)) != -1) {
                    let dom = domPool[channel].shift();
                    let text = options.danmuPool.shift();
                    shootDanmu(dom, text, channel, options);
                    if (options.allow_repeat) {
                        options.danmuPool.push(text);
                    }
                }
            }, 1);
        })
    }

    let init = function(_this, options) {
        let wrapper = _this;
        for (let j = 0; j < options.channel_count; j++) { 
            let doms = [];
            for (let i = 0; i < options.max_dm_count; i++) {
             
                let dom = document.createElement('span');
                wrapper.appendChild(dom);
                
                dom.className = 'right';

                dom.style.top = j * +
				120 +20 + 'px';
             
                doms.push(dom);
                
                dom.addEventListener('transitionend', () => {
                    dom.className = 'right';
                    dom.style.transform = null;
                    domPool[j].push(dom);
                });
            }
            domPool.push(doms);
        }
        for (let i = 0; i < options.channel_count; i++) {
            hasPosition[i] = true;
        }
    }

    let shootDanmu = function(dom, text, channel, options) {
        // dom.innerText = text;
        dom.innerHTML = options.danmuTpl(text);
        dom.style.transform = `translateX(${-dom.clientWidth}px)`;
        dom.className = 'left';
        hasPosition[channel] = false;
        setTimeout(() => {
            hasPosition[channel] = true;
        }, dom.clientWidth * 10 + 1000);
    }

    let getChannel = function(opt) {
        for (let i = 0; i < opt.channel_count; i++) {
            if (hasPosition[i] && domPool[i].length) return i;
        }
        return -1;
    }
    $.fn.extend({
        barrage: barrage
    })
}(jQuery)
