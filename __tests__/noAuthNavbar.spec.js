import React from 'react';
import { shallow } from 'enzyme';
import NoAuthNavbar from '../assets/js/components/NoAuthNavbar';

const wrapper = shallow(<NoAuthNavbar />);

describe('<NoAuthNavbar />', () => {
  it('renders three <div> in <NoAuthNavbar />', () => {
    expect(wrapper.find('div')).toHaveLength(3);
  });

  it('renders home in <NoAuthNavbar />', () => {
    expect(wrapper.text()).toContain('Home');
  });

  it('renders login in <NoAuthNavbar />', () => {
    expect(wrapper.text()).toContain('Login');
  });
});
