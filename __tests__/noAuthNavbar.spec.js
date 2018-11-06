import React from 'react';
import { shallow } from 'enzyme';
import NoAuthNavbar from '../assets/js/components/NoAuthNavbar';

const wrapper = shallow(<NoAuthNavbar />);

describe('<NoAuthNavbar />', () => {
  it('renders three <div> in <NoAuthNavar />', () => {
    expect(wrapper.find('div')).toHaveLength(3);
  });

  it('renders home in <NoAuthNavar />', () => {
    expect(wrapper.text()).toContain('Home');
  });

  it('renders register in <NoAuthNavar />', () => {
    expect(wrapper.text()).toContain('Register');
  });

  it('renders login in <NoAuthNavar />', () => {
    expect(wrapper.text()).toContain('Login');
  });
});
