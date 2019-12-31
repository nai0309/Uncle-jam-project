const slideData = [
  {
    index: 0,
    headline: 'GO Get Pie',
    button: 'Order now',
    src: './img/product/pie-lemon-slide.jpg',
    link: '#'
  },

  {
    index: 1,
    headline: 'GO Get Cashew Butter',
    button: 'Order now',
    src: './img/product/pie-taro-slide.jpg',
    link: '#'
  },

  {
    index: 2,
    headline: 'GO Get Cake',
    button: 'Order now',
    src: './img/product/cake-carrot-slide.jpg',
    link: '#'
  },

  {
    index: 3,
    headline: 'GO Get Cookies',
    button: 'Order now',
    src: './img/product/cookies.jpg',
    link: '#'
  },

  {
    index: 4,
    headline: 'GO Get Oatcake',
    button: 'Order now',
    src: './img/product/oatcake-1.jpg',
    link: '#'
  }];




// =========================
// Slide
// =========================

class Slide extends React.Component {
  constructor(props) {
    super(props);

    this.handleMouseMove = this.handleMouseMove.bind(this);
    this.handleMouseLeave = this.handleMouseLeave.bind(this);
    this.handleSlideClick = this.handleSlideClick.bind(this);
    this.imageLoaded = this.imageLoaded.bind(this);
    this.slide = React.createRef();
  }

  handleMouseMove(event) {
    const el = this.slide.current;
    const r = el.getBoundingClientRect();

    el.style.setProperty('--x', event.clientX - (r.left + Math.floor(r.width / 2)));
    el.style.setProperty('--y', event.clientY - (r.top + Math.floor(r.height / 2)));
  }

  handleMouseLeave(event) {
    this.slide.current.style.setProperty('--x', 0);
    this.slide.current.style.setProperty('--y', 0);
  }

  handleSlideClick(event) {
    this.props.handleSlideClick(this.props.slide.index);
  }

  imageLoaded(event) {
    event.target.style.opacity = 1;
  }

  render() {
    const { link, src, button, headline, index } = this.props.slide;
    const current = this.props.current;
    let classNames = 'slide';

    if (current === index) classNames += ' slide--current'; else
      if (current - 1 === index) classNames += ' slide--previous'; else
        if (current + 1 === index) classNames += ' slide--next';

    return (
      React.createElement("li", {
        ref: this.slide,
        className: classNames,
        onClick: this.handleSlideClick,
        onMouseMove: this.handleMouseMove,
        onMouseLeave: this.handleMouseLeave
      },

        React.createElement("div", { className: "slide__image-wrapper" },
          React.createElement("img", {
            className: "slide__image",
            alt: headline,
            src: src,
            onLoad: this.imageLoaded
          })),



        React.createElement("article", { className: "slide__content" },
          React.createElement("h2", { className: "slide__headline" }, headline),
          React.createElement("a", {
            className: "btn__link",
            href: link
          },
            React.createElement("button", { className: "slide__action btn" }, button)))));



  }
}



// =========================
// Slider control
// =========================

const SliderControl = ({ type, title, handleClick }) => {
  return (
    React.createElement("button", { className: `btn btn--${type}`, title: title, onClick: handleClick },
      React.createElement("svg", { className: "icon", viewBox: "0 0 24 24" },
        React.createElement("path", { d: "M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" }))));



};


// =========================
// Slider
// =========================

class Slider extends React.Component {
  constructor(props) {
    super(props);

    this.state = { current: 1 };
    this.handlePreviousClick = this.handlePreviousClick.bind(this);
    this.handleNextClick = this.handleNextClick.bind(this);
    this.handleSlideClick = this.handleSlideClick.bind(this);
  }

  handlePreviousClick() {
    const previous = this.state.current - 1;

    this.setState({
      current: previous < 0 ?
        this.props.slides.length - 1 :
        previous
    });

  }

  handleNextClick() {
    const next = this.state.current + 1;

    this.setState({
      current: next === this.props.slides.length ?
        0 :
        next
    });

  }

  handleSlideClick(index) {
    if (this.state.current !== index) {
      this.setState({
        current: index
      });

    }
  }

  render() {
    const { current, direction } = this.state;
    const { slides, heading } = this.props;
    const headingId = `slider-heading__${heading.replace(/\s+/g, '-').toLowerCase()}`;
    const wrapperTransform = {
      'transform': `translateX(-${current * (100 / slides.length)}%)`
    };


    return (
      React.createElement("div",{className:"slider_container"},
      React.createElement("h1",{className:"text-center"},"所有商品"),

      React.createElement("div",{ className: "slider", "aria-labelledby": headingId },
        React.createElement("ul", { className: "slider__wrapper", style: wrapperTransform },
          slides.map(slide => {
            return (
              React.createElement(Slide, {
                key: slide.index,
                slide: slide,
                current: current,
                handleSlideClick: this.handleSlideClick
              }));


          })),


        React.createElement("div", { className: "slider__controls" },
          React.createElement(SliderControl, {
            type: "previous",
            title: "Go to previous slide",
            handleClick: this.handlePreviousClick
          }),


          React.createElement(SliderControl, {
            type: "next",
            title: "Go to next slide",
            handleClick: this.handleNextClick
          })))));




  }
}



ReactDOM.render(React.createElement(Slider, { heading: "Example Slider", slides: slideData }), document.getElementById('productSlide'));