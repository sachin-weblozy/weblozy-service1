import Plyr from 'plyr';
window.Plyr = Plyr;

let videos = document.querySelectorAll('.video-wrapper');

videos.forEach(video => {
    video.querySelector('.poster').addEventListener('click', e => {
        let vwrapper = e.target.closest('.video-wrapper');
        let url = e.target.dataset.video;
        let img = e.target.querySelector('img');

        let videoElem = '';

        if ( url.includes('youtube.com/watch') ) {
            let embedId = url.split('?v=')[1];
            videoElem = `<div class="video-container"><div class="video" data-plyr-provider="youtube" data-plyr-embed-id="${embedId}"></div></div>`;
        }
        else if ( url.includes('vimeo.com/video') ) {
            // let embedId = url.split('?')[0].split('/video/')[1];
            // let embedId = url;
            // videoElem = `<div class="video-container"><div class="video" data-plyr-provider="vimeo" data-plyr-embed-id="${embedId}"></div></div>`;
            videoElem = `<div class="video-container">
            <div class="plyr__video-embed video">
            <iframe
                src="${url}&amp;loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
                allowfullscreen
                allowtransparency
                allow="autoplay"
            ></iframe>
            </div>
            </div>`;
        }
        else {
            videoElem = `<div class="video-container"><video class="video" playsinline controls poster="${img.currentSrc || img.src}"><source src="${url}"></source></video></div>`;
        }

        // let videomodal = document.createElement('div');
        // videomodal.className = 'video-modal';
        // videomodal.innerHTML = videoElem;

        // document.querySelector('body').prepend(videomodal);
        e.target.outerHTML = videoElem;

        // console.log(e.target);

        new Plyr(vwrapper.querySelector('.video'));

        // document.querySelector('.video-modal').addEventListener('click', e => {
        //     if (e.target.className == 'video-modal') {
        //         document.querySelector('.video-modal').remove();
        //     }
        // });
    });
});