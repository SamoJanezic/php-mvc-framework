const handleInfiniteScroll = () => {
    const endOfPage = window.innerHeight + window.scrollY >= document.body.offsetHeight;
    if (endOfPage) {
        console.log('end of page');
    }
};

window.addEventListener("scroll", handleInfiniteScroll);